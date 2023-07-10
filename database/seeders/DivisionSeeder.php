<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Seeder;
use App\Models\Settings\Location\Division;
use Carbon\Carbon;

class DivisionSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
          Division::truncate();
       Schema::enableForeignKeyConstraints();

        $csvFile=fopen(base_path("database/data/divisions.csv"),"r");
        while(($data=fgetcsv($csvFile,2000,","))!==FALSE){
            Division::create(array(
                "id"=>trim($data['0']),
                "name"=>trim($data['1']),
                "name_bn"=>trim($data['2']),
                "country_id"=>trim($data['3']),
                "created_at"=>Carbon::now()
            ));
        }
        fclose($csvFile);
    }
}
