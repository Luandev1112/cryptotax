<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Coin extends Component
{
    public string $name = "";
    public string $label = "";
    public string $icon = "";
    public string $color = "";
    public string $short = "";
    public string $caption = "";


    public function __construct(string $name, ?string $label = null, ?string $caption = null)
    {
        $this->name = strtoupper($name);
        $this->initItem($this->name);

        if($label !== null) {
            $this->label = $label;
        }
        if($caption !== null) {
            $this->caption = $caption;
        }
    }


    public function render()
    {
        return view('components.coin');
    }


    private function initItem($name)
    {
        $this->short = $name;

        switch ($name) {
            case "BTC":
                $this->label = $this->short;
                $this->caption = "Bitcoin";
                $this->icon = "cri-btc";
                $this->color = "e79934";
                break;
            case "LTC":
                $this->label = $this->short;
                $this->caption = "Lite Coin";
                $this->icon = "cri-ltc";
                $this->color = "c0c0c0";
                break;
            case "XRP":
                $this->label = $this->short;
                $this->caption = "Ripple";
                $this->icon = "cri-xrp";
                $this->color = "000";
                break;
            case "ADA":
                $this->label = $this->short;
                $this->caption = "Cardano";
                $this->icon = "cri-ada";
                $this->color = "2a71d0";
                break;
            case "MIOTA":
                $this->label = $this->short;
                $this->caption = "Miota";
                $this->icon = "cri-miota";
                $this->color = "000";
                break;
            case "DASH":
                $this->label = $this->short;
                $this->caption = "Dash";
                $this->icon = "cri-dash";
                $this->color = "3a90db";
                break;
            case "ETH":
                $this->label = $this->short;
                $this->caption = "Ethereum";
                $this->icon = "cri-eth";
                $this->color = "545454";
                break;
            default:
                $this->label = $this->short;
                $this->caption = $name;
                $this->icon = "fas-question-circle";
                $this->color = "CCC";
                break;
        }
    }
}
