<?php

use Illuminate\Database\Seeder;
use Faker\Provider\Lorem;

class GeneralDataTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('general_data')->insert([
            'terms' => Lorem::text()
        ]);
    }
}
