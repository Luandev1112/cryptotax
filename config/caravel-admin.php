<?php

return [
    "resources" => [
        "path" => app_path('CaravelAdmin/Resources'),
        "controller" => \App\Http\Controllers\Admin\ResourceController::class,
        "namespace" => "App\\CaravelAdmin\\Resources",
        "prefix" => "caravel-admin.",
        "route_prefix" => "admin.",
    ],
    "component-aliases" => [
        \WireUi\View\Components\Button::class => "app-ui::button"
    ]
];
