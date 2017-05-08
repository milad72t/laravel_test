<?php

namespace App\Http\Middleware;

use Closure;

class test_mid
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->name == 'milad') {
            //$group = $request->test
            echo "your name is banned :".$request->name;
            echo nl2br("\n");
            //return redirect('test');
        }
        echo nl2br("no problem \n");
        return $next($request);
    }
}
