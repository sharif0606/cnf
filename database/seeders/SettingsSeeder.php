<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Seeder;
use App\Models\setting;
use Carbon\Carbon;

class SettingsSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
            setting::truncate();
        Schema::enableForeignKeyConstraints();
       
        setting::create(array(
                "header_logo"=>"khulsi_club_logo.png",
                "footer_logo"=>"khulsi_club_logo.png",
                "address"=>"s BDBL Bhaban (Level 5 - West), 12 Kawran Bazar, Dhaka -1215",
                "contact_no"=>"16247",
                "email_address"=>"khulsiclaub@khulsiclub.com",
                "facebook_link"=>"",
                "twitter_link"=>"",
                "youtube_link"=>"",
                "linkdin_link"=>"",
                "we_accept"=>"img/amex.png",
                "footer_top_p1_text"=>"HAVE QUESTIONS? ASK A SPECIALIST",
                "footer_top_p1_image"=>"<i class='bi bi-headset'></i>",
                "footer_top_p2_text"=>"16488",
                "footer_top_p2_image"=>"",
                "footer_top_p3_text"=>"6 DAYS A WEEK FROM 10:00 AM TO 6:00PM",
                "footer_top_p3_image"=>"",
                "created_at"=>Carbon::now()
            ));
    }
}
