<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Seeder;
use App\Models\Settings\Location\Country;
use Carbon\Carbon;

class CountrySeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
            Country::truncate();
        Schema::enableForeignKeyConstraints();
        

        Country::create(array(
                "code"=>"+88",
                "name"=>"Bangladesh",
                "name_bn"=>"বাংলাদেশ",
                "created_at"=>Carbon::now()
            ));
    }
}
