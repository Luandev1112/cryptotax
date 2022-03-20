<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TestUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        collect([
            [
                'name' => "Administrator Test",
                'email' => "admin@example.com",
            ],
            [
                'name' => "Customer Test",
                'email' => "customer@example.com",
            ],
            [
                'name' => "Tax Advisor Test",
                'email' => "tax-advisor@example.com",
            ],
            [
                'name' => "Editor Test",
                'email' => "editor@example.com",
            ],
            [
                'name' => "Support Test",
                'email' => "support@example.com",
            ],
            [
                'name' => "Premium User Test",
                'email' => "premium-customer@example.com",
            ],
            [
                'name' => "Free User Test",
                'email' => "free-customer@example.com",
            ],
        ])->each(function($data){
            if(!User::query()->where("email", $data["email"])->exists()) {
                $data["password"] = bcrypt(isset($data["password"]) && $data["password"] ? $data["password"] : $data["email"]);
                $data["created_at"] = now();
                DB::table('users')->insert($data);
            }
        });
    }
}
