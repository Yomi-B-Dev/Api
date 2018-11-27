<?php

use Illuminate\Database\Seeder;
use App\Models\Entities\GuestHelp;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        factory(App\Models\Entities\UserHelp::class, 5)->create();
        factory(App\Models\Entities\GuestHelp::class, 5)->create();

        $this->call(GeneralDataSeeder::class);

        $this->call(MovementSeeder::class);
    }
}
