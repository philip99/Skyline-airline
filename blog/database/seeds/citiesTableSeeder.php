<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class citiesTableSeeder extends Seeder
{
    public static $cities = array("Eindhoven", "Rome", "Oslo" ,"Lisbon" ,"Copenhagen" ,"Valencia" ,"Zurich" ,"Stockholm");

    public static $cities_dicription = array("If you find yourself in the Netherlands' fifth-biggest city it's probably for an international budget flight or to watch a football match at PSV's Philips Stadium. But Eindhoven is also a vibrant centre for creative design and post-industrial reinvention. ",
    "A heady mix of haunting ruins, awe-inspiring art and vibrant street life, Italy’s hot-blooded capital is one of the world’s most romantic and inspiring cities.",
    "Surrounded by mountains and sea, this compact, cultured and fun city has a palpable sense of reinvention." ,
    "Seven cinematic hillsides overlooking the Rio Tejo cradle Lisbon's postcard-perfect panorama of cobbled alleyways, ancient ruins and white-domed cathedrals – a captivating scene crafted over centuries." ,
    "Copenhagen is the epitome of Scandi cool. Modernist lamps light New Nordic tables, bridges buzz with cycling commuters and eye-candy locals dive into pristine waterways." ,
    "Valencia is a clean and leafy town with stately tree-lined avenues and a large, grassed central square. " ,
    "Culturally vibrant, efficiently run and attractively set at the meeting of river and lake, Zürich is regularly recognised as one of the world's most liveable cities." ,
    "Stockholmers call their city 'beauty on water'. But despite the well-preserved historic core, Stockholm is no museum piece: it's modern, dynamic and ever-evolving.");

    
    /**
     * Run the database seeds.use Carbon\Carbon;
     *
     * @return void
     */
    public function run()
    {
        $dt = Carbon::now();
        $dateNow = $dt->toDateTimeString();
        for ($i = 0; $i<count(citiesTableSeeder::$cities) ; $i++) {

            DB::table('cities')->insert([
                'name' => citiesTableSeeder::$cities[$i],
                'description' => citiesTableSeeder::$cities_dicription[$i] ,
                'img_url' =>  citiesTableSeeder::$cities[$i] . ".jpg",
                'created_at' => $dateNow,
                'updated_at' => $dateNow
            ]);
        }
    }
}
