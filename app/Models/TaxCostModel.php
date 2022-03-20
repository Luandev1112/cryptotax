<?php

namespace App\Models;

use App\Models\Traits\HasName;
use Illuminate\Database\Eloquent\Model;

class TaxCostModel extends Model
{
    use HasName;

    const MODEL_FIFO = 1;
}
