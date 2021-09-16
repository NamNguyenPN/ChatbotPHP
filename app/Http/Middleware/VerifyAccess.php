<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class VerifyAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $local_token = env("FACEBOOK_MESSENGER_WEBHOOK_TOKEN");
        $hub_verify_token = request('hub_verify_token');
        if($hub_verify_token === $local_token){
            return response($request->input("hub_challenge"),200);
        }
        
        return $next($request);
    }
}
