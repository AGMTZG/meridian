<?php

namespace App\Http\Controllers\Auth;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\TwoFactorRequest;
use App\Services\Auth\TwoFactorService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TwoFactorController extends Controller
{
    public function __construct(private TwoFactorService $twoFactorService) {}

    public function enable(Request $request): JsonResponse
    {
        $result = $this->twoFactorService->enable($request->user());

        return ApiResponse::success($result, '2FA setup initiated. Scan the QR code.');
    }

    public function confirm(TwoFactorRequest $request): JsonResponse
    {
        $confirmed = $this->twoFactorService->confirm($request->user(), $request->code);

        if (!$confirmed) {
            return ApiResponse::error('Invalid 2FA code', 422);
        }

        return ApiResponse::success(message: '2FA enabled successfully');
    }

    public function verify(TwoFactorRequest $request): JsonResponse
    {
        $valid = $this->twoFactorService->verify($request->user(), $request->code);

        if (!$valid) {
            return ApiResponse::unauthorized('Invalid 2FA code');
        }

        return ApiResponse::success(message: '2FA verified successfully');
    }

    public function disable(Request $request): JsonResponse
    {
        $this->twoFactorService->disable($request->user());

        return ApiResponse::success(message: '2FA disabled successfully');
    }
}
