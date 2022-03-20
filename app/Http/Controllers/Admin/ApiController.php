<?php

namespace App\Http\Controllers\Admin;

use App\Models\CryptoExchange;

class ApiController
{
    protected string $routeSlug = "api";
    protected string $label = "API";
    protected string $labelPlural = "API's";


    public function index()
    {
        return view('pages.admin.' . $this->routeSlug .'.index', [
            "label" => $this->label,
            "labelPlural" => $this->labelPlural,
        ]);
    }


    public function edit(CryptoExchange $model)
    {
        return view('pages.admin.' . $this->routeSlug .'.edit', [
            "model" => $model,
            "slug" => $this->routeSlug,
            "label" => $this->label,
            "labelPlural" => $this->labelPlural,
        ]);
    }
}
