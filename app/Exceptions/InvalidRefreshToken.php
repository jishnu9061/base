<?php

declare(strict_types=1);

namespace App\Exceptions;

use App\Traits\ApiResponseTrait;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class InvalidRefreshToken extends Exception
{
    use ApiResponseTrait;

    /**
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function render(Request $request): JsonResponse
    {
        return $this->makeErrorResponse(
            __('messages.validation.invalid_refresh_token'),
            'InvalidRefreshToken',
        );
    }
}
