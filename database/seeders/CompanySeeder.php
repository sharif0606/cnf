<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Seeder;
use App\Models\Settings\Company;
use Carbon\Carbon;

class CompanySeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    
    public function run()
    {
        Company::create(array(
                "name"=>"khulsiclaub",
                "contact"=>"16247",
                "status"=>"1",
                "created_at"=>Carbon::now()
            ));
    }
}
