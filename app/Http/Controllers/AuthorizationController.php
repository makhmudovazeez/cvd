<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthorizationRequest;
use App\Http\Requests\RefreshTokenRequest;
use App\Services\AuthorizationService;
use App\Services\UserService;
use App\Traits\TokenCredentials;

/**
 * Class AuthorizationController
 * @package App\Http\Controllers
 */

final class AuthorizationController extends Controller
{
    use TokenCredentials;

    /** @var AuthorizationService */
    private $authorizationService;
    private $userService;

    public function __construct(AuthorizationService $authorizationService, UserService $userService)
    {
        $this->authorizationService = $authorizationService;
        $this->userService = $userService;
    }

    /**
     * @param AuthorizationRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(AuthorizationRequest $request){
        $data = $this->authorizationService->getToken($request->only('username', 'password'));
        $user = [];
        if (isset($data['access_token'])){
            $user = $this->responseToken($data['access_token']);
            $data = array_merge(['user' => $user], $data);
        }
        return response()->json($data);
    }

    /**
     * @param RefreshTokenRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function refreshToken(RefreshTokenRequest $request){
        $data = $this->authorizationService->refreshToken($request->refresh_token);

        $user = [];
        if (isset($data['access_token'])){
            $user = $this->responseToken($data['access_token']);
            $data = array_merge(['user' => $user], $data);
        }
        return response()->json($data);
    }
}
