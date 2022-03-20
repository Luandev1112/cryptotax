<?php

namespace Spark;

use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'receipts';

    /**
     * The guarded attributes on the model.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * Get the user that owns the receipt.
     */
    public function user()
    {
        return $this->owner();
    }

    /**
     * Get the model related to the receipt.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function owner()
    {
        $model = config('cashier.model');

        return $this->belongsTo($model, (new $model)->getForeignKey());
    }
}
