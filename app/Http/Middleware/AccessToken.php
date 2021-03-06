<?php

namespace App\Http\Middleware;

use App\Traits\TokenCredentials;
use Closure;
use Illuminate\Http\Request;

class AccessToken
{
    use TokenCredentials;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if ($this->requestToken()){
            return $next($request);
        }
        return response()->json('lol');
    }
}
