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
        DB::table('users')->insert(
            [
                ['name' => 'admin','surname' => 'Admin', 'phone'=>'234-24-23','address' =>'Lviv',],
                ['name' => 'Volodya','surname' => 'Tuvonuk', 'phone'=>rand(10000000, 999999999999999),'address' =>'Lviv',],
                ['name' => 'Andrew','surname' => 'Semurenko', 'phone'=>rand(10000000, 999999999999999),'address' =>'Kiev',],
                ['name' => 'Liliia','surname' => 'Demkovska', 'phone'=>rand(10000000, 999999999999999),'address' =>'Lviv',],
                ['name' => 'Vika','surname' => 'Bila', 'phone'=>rand(10000000, 999999999999999),'address' =>'Kiev',],
            ]
        );
    }
}
