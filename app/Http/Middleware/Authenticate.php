<?php

namespace App\Http\Middleware;

use App\User;
use Hash;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */
    protected function redirectTo($request)  {

        $guestname = User::where('email',$request->email)->first();

        if(User::where('email',$request->email)->exists())
        {
            if(Hash::check($request->password,$guestname->password)){

                return route('hyd');
            }             
               return "whats going on";
        }
        elseif(! $request->expectsJson()) {                
                return route('login');
        }
    }
}
