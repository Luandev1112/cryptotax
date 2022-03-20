<?php

namespace Database\Seeders;

use App\Models\TaxCostModel;
use Illuminate\Database\Seeder;

class TaxCostModelSeeder extends Seeder
{
    public function run()
    {
        $items = [
            [
                "id" => TaxCostModel::MODEL_FIFO,
                "name" => "FIFO (First in, First out)",
            ],
        ];

        foreach($items AS &$item) {
            $item["created_at"] = now();
        }

        // Clear db table
        TaxCostModel::query()->truncate();
        TaxCostModel::insert($items);
    }
}
