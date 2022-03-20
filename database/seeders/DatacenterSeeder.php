<?php

namespace Database\Seeders;

use App\Models\Datacenter;
use Illuminate\Database\Seeder;

class DatacenterSeeder extends Seeder
{
    public function run()
    {
        collect([
            [
                'id' => Datacenter::CENTER_EU,
                'name' => "Europe",
            ],
            [
                'id' => Datacenter::CENTER_US,
                'name' => "United States",
            ],
        ])->each(function($data){
            if(!Datacenter::find($data["id"])) {
                Datacenter::make($data)->save();
            }
        });
    }
}
