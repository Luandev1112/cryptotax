<?php

namespace App\Http\Livewire\Customer\Dashboard;

use Livewire\Component;

class About extends Component
{
    public?array $steps = null;
    public?int $selected_step = null;

    public function __construct()
    {
        $this->steps = [
            [ 
                'id' => 1, 'status' => 1, 'label' => 'Tax Settings', 
                'description' =>'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.', 
                'action' => '', 'image' => 'assets/img/svg/wizzard_1.svg', 'icon' => 'tax-2', 'button' => 'Tax Settings'
            ],
            [ 
                'id' => 2, 'status' => 1, 'label' => 'Account import', 
                'description' =>'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.', 
                'action' => '', 'image' => 'assets/img/svg/wizzard_2.svg', 'icon' => 'wallet-2', 'button' => 'Add Account'
            ],
            [ 
                'id' => 3, 'status' => 1, 'label' => 'Upgrade your plan', 
                'description' =>'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.', 
                'action' => '', 'image' => 'assets/img/svg/wizzard_3.svg', 'icon' => 'upgrade', 'button' => 'Upgrade' 
            ],
            [ 
                'id' => 4, 'status' => 2, 'label' => 'Review transactions', 
                'description' =>'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.', 
                'action' => '', 'image' => 'assets/img/svg/wizzard_4.svg', 'icon' => 'transaction-3', 'button' => 'Transactions' 
            ],
            [ 
                'id' => 5, 'status' => 3, 'label' => ' Tax Calculation', 
                'description' =>'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.', 
                'action' => '', 'image' => 'assets/img/svg/wizzard_5.svg', 'icon' => 'tax-calc', 'button' => 'Tax Calculation' 
            ],
            [ 
                'id' => 6, 'status' => 3, 'label' => 'Invite a Friend', 
                'description' =>'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.', 
                'action' => '', 'image' => 'assets/img/svg/wizzard_6.svg', 'icon' => 'invite-1', 'button' => 'Invite a Friend' 
            ],
            [ 
                'id' => 7, 'status' => 4, 'label' => 'write a review', 
                'description' =>'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.', 
                'action' => '', 'image' => 'assets/img/svg/wizzard_7.svg', 'icon' => 'write', 'button' => 'Review' 
            ],
        ];  

        $this->selected_step = 1;
    }

    public function get_selected_step( int $id )
    {
        $this->selected_step = $id;
    }

    public function render()
    {
        $selected_step = $this->steps[$this->selected_step-1];
        return view('livewire.customer.dashboard.about', [
            'selected' => $selected_step
        ]);
    }
}
