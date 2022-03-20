<?php

namespace Database\Seeders;

use App\Models\Blockchain;
use Illuminate\Database\Seeder;

class BlockchainSeeder extends Seeder
{
    public function run()
    {
        collect([
            [
                'name' => "bscscan",
                "class" => "BscScanBlockChainApi"
            ],
            [
                'name' => "cronos",
                "class" => "CronosBlockChainApi"
            ],
        ])->each(function($data){
            Blockchain::upsert($data, []);
        });
    }
}
