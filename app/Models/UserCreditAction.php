<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class UserCreditAction extends Model
{
    const UPDATED_AT = null;


    public function scopeActive(Builder $query)
    {
        $now = now();

        return $query
            ->where("valid_from", "<=", $now)
            ->where(function($q) use ($now) {
                $q->where("valid_till", ">=", $now)
                    ->orWhereNull("valid_till");
            })
            ->orderBy("valid_from", 'desc');
    }


    public function getName(): string
    {
        return $this->name;
    }


    public static function findAction(string $code): ?self
    {
        return self::query()
            ->where("action_code", $code)
            ->active()
            ->first();
    }
}
