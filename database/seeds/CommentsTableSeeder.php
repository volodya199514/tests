<?php

use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comments')->insert([
            ['comment'=>'Новий коментар 1', 'rating'=>'3', 'user_id'=>'2'],
            ['comment'=>'Новий коментар 2', 'rating'=>'2', 'user_id'=>'2'],
            ['comment'=>'Новий коментар 3', 'rating'=>'5', 'user_id'=>'1'],
            ['comment'=>'Новий коментар 4', 'rating'=>'4', 'user_id'=>'3'],
            ['comment'=>'Новий коментар 5', 'rating'=>'1', 'user_id'=>'4'],
            ['comment'=>'Новий коментар 6', 'rating'=>'3', 'user_id'=>'4'],
            ['comment'=>'Новий коментар 7', 'rating'=>'2', 'user_id'=>'1'],
            ['comment'=>'Новий коментар 8', 'rating'=>'1', 'user_id'=>'4'],
            ['comment'=>'Новий коментар 9', 'rating'=>'5', 'user_id'=>'1'],
            ['comment'=>'Новий коментар 10', 'rating'=>'4', 'user_id'=>'1'],
            ['comment'=>'Новий коментар 11', 'rating'=>'1', 'user_id'=>'1'],
            ['comment'=>'Новий коментар 12', 'rating'=>'2', 'user_id'=>'1'],
            ['comment'=>'Новий коментар 13', 'rating'=>'5', 'user_id'=>'3'],
            ['comment'=>'Новий коментар 14', 'rating'=>'5', 'user_id'=>'4'],
            ['comment'=>'Новий коментар 15', 'rating'=>'5', 'user_id'=>'4'],

        ]);
    }
}
