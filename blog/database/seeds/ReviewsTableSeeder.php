<?php

use Illuminate\Database\Seeder;

class ReviewsTableSeeder extends Seeder
{
    
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reviews')->insert([
            'user_id' => $date,
            'title' => FlightsTableSeeder::$cities[rand(0, sizeof(FlightsTableSeeder::$cities)-1)],
            'content' => date_modify($date, '+1 hour'),
            'created_at' => $dateNow,
            'updated_at' => $dateNow

        ]);
    }
}
