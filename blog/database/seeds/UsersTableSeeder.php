<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' =>'Mara Coman',
            'email' => 'maracoman@gmail.com' ,
            'password' => bcrypt('123456'),
            'user_role' => '0',

        ]);

        DB::table('users')->insert([
            'name' =>'Barra Abd Al Fattah',
            'email' => 'barra@gmail.com' ,
            'password' => bcrypt('123456'),
            'user_role' => '0',
        ]);
        DB::table('users')->insert([
            'name' =>'Johnny',
            'email' => 'johhny@gmail.com' ,
            'password' => bcrypt('123456'),
            'user_role' => '1',
        ]);
        DB::table('users')->insert([
            'name' =>'Mary',
            'email' => 'mary@gmail.com' ,
            'password' => bcrypt('123456'),
            'user_role' => '1',
        ]);



    }
}
