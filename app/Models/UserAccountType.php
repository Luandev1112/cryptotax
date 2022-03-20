<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property boolean $active
 * @property boolean $is_customer
 */
class UserAccountType extends Model
{
    const TYPE_ADMIN = 1;
    const TYPE_CUSTOMER_FREE = 2;
    const TYPE_TAX_ADVISOR = 3;
    const TYPE_SUPPORT = 4;
    const TYPE_EDITOR = 5;
    const TYPE_CUSTOMER_PREMIUM = 6;
    const TYPE_AFFILIATE = 7;


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function users(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(User::class);
    }


    /**
     * @return int[]
     */
    public static function customerTypes(): array
    {
        return [
            self::TYPE_CUSTOMER_FREE,
            self::TYPE_CUSTOMER_PREMIUM,
        ];
    }


    /**
     * @return int[]
     */
    public static function adminPanelTypes(): array
    {
        return [
            self::TYPE_ADMIN,
            self::TYPE_SUPPORT,
            self::TYPE_EDITOR,
        ];
    }


    /**
     * @return int[]
     */
    public static function customerPanelTypes(): array
    {
        return [
            self::TYPE_CUSTOMER_FREE,
            self::TYPE_CUSTOMER_PREMIUM,
            self::TYPE_TAX_ADVISOR,
            self::TYPE_AFFILIATE,
        ];
    }


    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
}
