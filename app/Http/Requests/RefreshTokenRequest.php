<?php


namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class RefreshTokenRequest
 * @package App\Http\Requests
 *
 * This class validate the request before refresh token
 * @property $refresh_token string
 */

final class RefreshTokenRequest extends FormRequest
{
    /**
     * @return array|\string[][]
     */
    public function rules(): array
    {
        return [
          'refresh_token' => ['required']
        ];
    }
}
