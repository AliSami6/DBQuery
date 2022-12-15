<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EmailVerifyUser
{
    public function handle(Request $request, Closure $next,$email)
    {
        if ($email == 'anis@gmail.com') {
           return $next($request);
        }
        return redirect()->route('home');
    }
     /**
     * Handle tasks after the response has been sent to the browser.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Illuminate\Http\Response  $response
     * @return void
     */
    public function terminate($request, $response)
    {
        echo 'your email verified.';
    }
}