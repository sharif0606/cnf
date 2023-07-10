<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Seeder;
use App\Models\Settings\Branch;
use Carbon\Carbon;

class BranchSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Branch::create(array(
                "name"=>"khulsiclaub",
                "contact"=>"16247",
                "status"=>"1",
                "company_id"=>"1",
                "created_at"=>Carbon::now()
            ));
    }
}
