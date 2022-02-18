<?php


namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class AuthorizationRequest
 * @package App\Http\Requests
 *
 * @property $username string
 * @property $password string
 */

final class AuthorizationRequest extends FormRequest
{
    /**
     * @return array|\string[][]
     */
    public function rules(): array
    {
        return [
            'username' => ['required'],
            'password' => ['required']
        ];
    }
}
