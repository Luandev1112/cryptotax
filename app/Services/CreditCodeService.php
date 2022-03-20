<?php

namespace App\Services;

use ReflectionClass;

class CreditCodeService
{
    const ACTION_REGISTER = "REGI";
    const ACTION_ADD_PREMIUM_MONTH = "PREM";
    const ACTION_ADD_PREMIUM_YEAR = "PREY";


    public static function allActions(): array
    {
        $ref = new ReflectionClass(self::class);
        $array = $ref->getConstants();

        return array_filter($array, function ($val) {
            return str_starts_with($val, "ACTION_");
        }, ARRAY_FILTER_USE_KEY);
    }


    public static function allActionsForSelect(): array
    {
        $array = array_flip(static::allActions());
        array_walk($array, function(&$val, $key) {
            $val = str_replace("_", " ", \Str::title(substr($val, 7)));
        });

        return $array;
    }


    public static function getLabel(string $action_code)
    {
        $array = static::allActionsForSelect();

        return $array[$action_code];
    }
}
