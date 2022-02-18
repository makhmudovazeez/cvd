<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthorizationRequest;
use App\Http\Requests\RefreshTokenRequest;
use App\Services\AuthorizationService;

/**
 * Class AuthorizationController
 * @package App\Http\Controllers
 */

final class AuthorizationController extends Controller
{
    /** @var AuthorizationService */
    private $authorizationService;

    public function __construct(AuthorizationService $authorizationService)
    {
        $this->authorizationService = $authorizationService;
    }

    /**
     * @param AuthorizationRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(AuthorizationRequest $request){
        $data = $this->authorizationService->getToken($request->only('username', 'password'));
        return response()->json($data);
    }

    /**
     * @param RefreshTokenRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function refreshToken(RefreshTokenRequest $request){
        $data = $this->authorizationService->refreshToken($request->refresh_token);
        return response()->json($data);
    }
}
