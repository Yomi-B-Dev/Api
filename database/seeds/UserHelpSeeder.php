<?php

use Illuminate\Database\Seeder;

class UserHelpSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Entities\UserHelp::class, 5)->create();
    }
}
