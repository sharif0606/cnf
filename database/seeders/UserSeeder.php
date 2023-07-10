<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create(array(
                "name"=>"admin",
                "email"=>"khulsiclaub@khulsiclub.com",
                "contact_no"=>"16247",
                "role_id"=>"1",
                "password"=>Hash::make("admin"),
                "language"=>"en",
                "company_id"=>"1",
                "branch_id"=>"1",
                "created_at"=>Carbon::now()
            ));
    }
}
