<?php

if (! function_exists('moneyFormat')) {
    /**
     * @param float|mixed $value
     * @param int $decimals
     * @return string
     */
    function moneyFormat($value, int $decimals = 2): string
    {
        return number_format($value, $decimals, ".", ",");
    }
}

if (! function_exists('notify')) {
    /**
     * @param string $title
     * @param string $msg
     * @param string $type  "success|error|info"
     * @return void
     */
    function notify(string $title, string $msg = "", string $type = "success"): void
    {
        session()->push("wireui.notify", [
            "title" => $title,
            "description" => $msg,
            "icon" => $type,
        ]);
    }
}
