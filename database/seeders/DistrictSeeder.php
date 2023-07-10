<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Seeder;
use App\Models\Settings\Location\District;
use Carbon\Carbon;

class DistrictSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        District::truncate();
       Schema::enableForeignKeyConstraints();
        
        
        $csvFile=fopen(base_path("database/data/districts.csv"),"r");
        while(($data=fgetcsv($csvFile,2000,","))!==FALSE){
            District::create(array(
                "id"=>trim($data['0']),
                "division_id"=>trim($data['1']),
                "name"=>trim($data['2']),
                "name_bn"=>trim($data['3']),
                "created_at"=>Carbon::now()
            ));
        }
        fclose($csvFile);
    }
}
