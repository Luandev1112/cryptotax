<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserAccountTypeMiddleware
{
    public function handle(Request $request, Closure $next, $typeSlug)
    {
        $types = [
            "admin" => "isAdminAccount",
            "customer" => "isCustomerAccount",
            "tax-advisor" => "isTaxAdvisorAccount",
            "support" => "isSupportAccount",
            "editor" => "isEditorAccount",
        ];
        $method = $types[$typeSlug];

        if(!$request->user() || !$request->user()->$method()) {
            //abort(Response::HTTP_FORBIDDEN);
            return redirect($request->isAdmin() ? "/admin/login" : route("login"));
        }

        return $next($request);
    }
}
