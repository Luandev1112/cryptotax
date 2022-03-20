<?php

namespace App\Models;

use App\Models\Traits\HasName;
use Illuminate\Database\Eloquent\Model;

class TaxCurrency extends Model
{
    use HasName;

    const CURRENCY_USD = 1;
    const CURRENCY_EUR = 2;
}
