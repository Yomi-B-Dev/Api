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
        factory(App\User::class, 50)->create([]);

        $this->call(RolesTableSeeder::class);
        $this->call(GeneralDataTableSeeder::class);

        factory(App\Models\Entities\UserHelp::class, 5)->create();
        factory(App\Models\Entities\GuestHelp::class, 5)->create();

        factory(App\Models\Entities\Post::class, 50)->create();
        factory(App\Models\Entities\PostLink::class, 50)->create();
        factory(App\Models\Entities\PostImage::class, 30)->create();
        factory(App\Models\Entities\PostVideo::class, 3)->create();
    }
}
