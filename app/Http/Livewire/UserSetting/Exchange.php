<?php

namespace App\Http\Livewire\UserSetting;

use Livewire\Component;

class Exchange extends Component
{
    public?int $type=null;

    public function __construct()
    {
        $this->type = 1;
    }

    public function render()
    {
        return view('livewire.user-setting.exchange');
    }
}
