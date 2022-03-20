<?php

namespace App\Helpers;

class BlockchainHelper
{
    //public static function loopOverChains(callable $callback): void
    //{
    //    collect(config("crypto.blockchains"))->each(function (array $item, string $name) use ($callback) {
    //        // Only enabled
    //        if(!$item["enabled"]) return;
    //
    //        // create api
    //        $class = $item["class"];
    //        $api = $class::make();
    //
    //        // Call callback
    //        $callback($api, $name);
    //    });
    //}


    public static function convertToDecimalString(int|string $value): string
    {
        return (string)((int)$value / pow(10, 18));
    }
}
