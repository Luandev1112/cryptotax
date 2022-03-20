<?php

namespace App\View\Components;

use Illuminate\View\Component;

class AppLayout extends Component
{
    /**
     * @var array Format: [["route" => "app.xy", "label" => "XY"]]
     */
    public array $breadcrumbs;
    /**
     * @var string
     */
    public string $title;


    /**
     * @param string $title
     * @param array $breadcrumbs
     */
    public function __construct(string $title = "", array $breadcrumbs = [])
    {
        $this->title = $title;
        $this->breadcrumbs = $breadcrumbs;
    }


    /**
     * Get the view / contents that represents the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('layouts.app');
    }
}
