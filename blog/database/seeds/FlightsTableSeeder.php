<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class FlightsTableSeeder extends Seeder
{

    public static $cities = array("Eindhoven", "Rome", "Oslo" ,"Lisbon" ,"Copenhagen" ,"Valencia" ,"Zurich" ,"Stockholm");

    /**
     * Run the database seeds.use Carbon\Carbon;
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i<20 ; $i++) {

            $date = $this->getRandomDateTime();
            //$depDate = $date->modify('+' . rand(1,20) . ' day');

            //$depDate =

            $dt = Carbon::now();
            $dateNow = $dt->toDateTimeString();
            DB::table('flights')->insert([
                'depDateTime' => $date,
                'depPlace' => FlightsTableSeeder::$cities[rand(0, sizeof(FlightsTableSeeder::$cities)-1)],
                'destDateTime' => date_modify($date, '+1 hour'),
                'destPlace' => FlightsTableSeeder::$cities[rand(0, sizeof(FlightsTableSeeder::$cities)-1)],
                'created_at' => $dateNow,
                'updated_at' => $dateNow

            ]);
        }
    }

    public function getRandomDateTime()
    {
        $startYear = 2018;
        $endYear = 2018;

        $startMounth = 1;
        $endMounth = 12;

        $startDay = 1;
        $endDay = 28;

        $date = new DateTime();
        $date->setDate(rand($startYear,$endYear) , rand($startMounth,$endMounth) , rand($startDay,$endDay));
        $date->setTime(rand(0,23),rand(0,59));

        return $date;
    }
}
