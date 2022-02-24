<?php


namespace App\Traits;


use App\Models\User;
use Illuminate\Support\Facades\Auth;

trait TokenCredentials
{
//            'uuid' => $data->sub,
//            'issued_at' => $data->iat,
//            'expiration_time' => $data->exp,
//            'jwt_id' => $data->jti,
//            'client_id' => $data->aud

    private $credentials;

    private function requestToken(){
        return $this->credentials(request()->bearerToken());
    }

    private function responseToken(string $token){
        return $this->credentials($token)->toArray();
    }

    private function credentials(string $token){

        $data = json_decode(base64_decode(str_replace('_', '/', str_replace('-','+',explode('.', $token)[1]))));

        $user = User::firstOrCreate([
            'uuid' => $data->sub
        ]);

        return Auth::loginUsingId($user->id);
    }
}
