<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SocialAuthItem extends Component
{
    public ?string $name = null;
    public ?string $icon = null;
    public ?string $size = null;


    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name, $icon, $size)
    {
        //
        $this->name = $name;
        $this->icon = $icon;
        $this->size = $size;
    }


    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.social-auth-item');
    }
}
