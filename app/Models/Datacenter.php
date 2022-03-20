<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Datacenter extends Model
{
    const CENTER_EU = 1;
    const CENTER_US = 2;


    public function getName(): string
    {
        return $this->name;
    }
}
