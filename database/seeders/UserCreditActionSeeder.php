<?php

namespace Database\Seeders;

use App\Models\UserAccountType;
use App\Models\UserCreditAction;
use App\Services\CreditCodeService;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserCreditActionSeeder extends Seeder
{
    public function run()
    {
        $now = now();

        collect([
            [
                'action_code' => CreditCodeService::ACTION_REGISTER,
                'name' => "Register as Free User",
                'name_public' => "Register",
                'value' => 2,
                'valid_from' => $now,
                'valid_till' => null,
            ],
            [
                'action_code' => CreditCodeService::ACTION_ADD_PREMIUM_YEAR,
                'name' => "Premium (Year)",
                "name_public" => "Become premium member",
                'value' => 2500,
                'valid_from' => $now,
                'valid_till' => null,
            ],
            [
                'action_code' => CreditCodeService::ACTION_ADD_PREMIUM_MONTH,
                'name' => "Premium (Month)",
                "name_public" => "Become premium member",
                'value' => 210,
                'valid_from' => $now,
                'valid_till' => null,
            ],
        ])->each(function($data){
            $exists = UserCreditAction::query()
                ->where("action_code", $data["action_code"])
                ->exists();

            if(!$exists) {
                DB::table(UserCreditAction::make()->getTable())->insert($data);
            }
        });
    }
}
