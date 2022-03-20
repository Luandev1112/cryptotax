<?php

namespace App\Models;

use App\Models\Traits\HasName;
use Illuminate\Database\Eloquent\Model;

class TaxCountry extends Model
{
    use HasName;

    const COUNTRY_USA = 1;
}
