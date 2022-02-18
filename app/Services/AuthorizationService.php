<?php


namespace App\Services;


use App\Helpers\ApiItems;
use Illuminate\Support\Facades\Http;

/**
 * Class AuthorizationService
 * @package App\Services
 * @version 1.0.0
 */

final class AuthorizationService extends ApiItems
{

    /**
     * @param array $credentials
     * @return string
     */
    public function getToken(array $credentials): array
    {
        $data = [
            'grant_type' => self::GRANT_TYPE_PASSWORD,
            'client_id' => config('key.client_id'),
            'client_secret' => config('key.client_secret'),
            'username' => $credentials['username'],
            'password' => $credentials['password']
        ];
        return Http::contentType(self::APPLICATION_JSON)->accept(self::APPLICATION_JSON)
            ->post(config('urls.sso_token'), $data)->json();
    }

    public function refreshToken(string $refresh_token): array
    {
        $data = [
            'grant_type' => self::GRANT_TYPE_REFRESH_TOKEN,
            'client_id' => config('key.client_id'),
            'client_secret' => config('key.client_secret'),
            'refresh_token' => $refresh_token
        ];
        return Http::contentType(self::APPLICATION_JSON)->accept(self::APPLICATION_JSON)
            ->post(config('urls.sso_token'), $data)->json();
    }


}
