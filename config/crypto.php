<?php

return [
    "blockchains" => [
        "bscscan" => [
            "class" => \App\Blockchains\BscScanBlockChainApi::class,
            "url" => "https://api.bscscan.com/api",
            "enabled" => true,
            "apiKey" => "1UXMY32BM8MZF6JAEUDR9WBHNSJBW9VXRT"
        ],
        "cronos" => [
            "class" => \App\Blockchains\CronosBlockChainApi::class,
            "url" => "https://cronos.crypto.org/explorer/api",
            "enabled" => true,
        ]
    ]
];
