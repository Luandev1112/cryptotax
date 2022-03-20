<?php

namespace App\Models;

use App\Models\Traits\HasName;
use Illuminate\Database\Eloquent\Model;

class Timezone extends Model
{
    use HasName;


    const TIMEZONE_UTC = 1;
}
