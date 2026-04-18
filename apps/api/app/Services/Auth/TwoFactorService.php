<?php

namespace App\Services\Auth;

use App\Models\User;
use PragmaRX\Google2FALaravel\Google2FA;

class TwoFactorService
{
    public function __construct(private Google2FA $google2fa) {}

    public function enable(User $user): array
    {
        $secret = $this->google2fa->generateSecretKey();

        $user->update(['two_factor_secret' => $secret]);

        $qrCodeUrl = $this->google2fa->getQRCodeUrl(
            config('app.name'),
            $user->email,
            $secret
        );

        return ['secret' => $secret, 'qr_code_url' => $qrCodeUrl];
    }

    public function confirm(User $user, string $code): bool
    {
        if (!$user->two_factor_secret) {
            return false;
        }

        $valid = $this->google2fa->verifyKey($user->two_factor_secret, $code);

        if ($valid) {
            $user->update(['two_factor_confirmed_at' => now()]);
        }

        return $valid;
    }

    public function verify(User $user, string $code): bool
    {
        if (!$user->two_factor_secret || !$user->two_factor_confirmed_at) {
            return false;
        }

        return $this->google2fa->verifyKey($user->two_factor_secret, $code);
    }

    public function disable(User $user): void
    {
        $user->update([
            'two_factor_secret'       => null,
            'two_factor_confirmed_at' => null,
        ]);
    }

    public function isEnabled(User $user): bool
    {
        return !is_null($user->two_factor_confirmed_at);
    }
}
