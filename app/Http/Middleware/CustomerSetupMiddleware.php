<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CustomerSetupMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $user = auth()->user();

        if(!$user->setupFinished()) {
            notify(
                __("Missing data"),
                __("You have to fill up all tax settings before you can use myCryptoTax"),
                "error"
            );

            return redirect(route("customer.user-setting", [
                "category" => "tax"
            ]));
        }

        return $next($request);
    }
}
