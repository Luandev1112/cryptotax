<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserCreditLog extends Model
{
    const UPDATED_AT = null;


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }


    public function getName(): string
    {
        return "#" . $this->id . ": "  . $this->action_code . " " . $this->created_at->format("Y-m-d H:i:s");
    }


    public static function log(int $userId, float $value, string $actionCode, ?int $actionId = null): self
    {
        $obj = self::make([
            'user_id' => $userId,
            'user_credit_action_id' => $actionId,
            'action_code' => $actionCode,
            'value' => $value
        ]);
        $obj->save();

        return $obj;
    }
}
