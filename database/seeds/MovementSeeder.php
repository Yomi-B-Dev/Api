<?php

use Illuminate\Database\Seeder;
use App\Models\Entities\Grade;

class MovementSeeder extends Seeder
{
    /**<?php

use Illuminate\Database\Seeder;
use App\Models\Entities\Grade;

class MovementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Entities\Movement::class)->create()->each(function ($movement) {

            $movement->leaderships()->saveMany($this->makeLeaderships(3, $movement->id));

            $movement->users()->saveMany($this->makeUsers(150));

        });

    }

    private function makeUsers($amount)
    {
        return factory(App\User::class, $amount)->create()->each(function ($user) {
            $user->posts()->saveMany($this->makePosts(rand(1, 3), $user->id));
        });
    }

    private function makePosts($amount, $author_id)
    {
        return factory(App\Models\Entities\Post::class, $amount)->create([
            'author_id' => $author_id
        ])->each(function ($post) {
            $post_id = $post->id;
            $post->postLink()->save(factory(App\Models\Entities\PostLink::class)->create([
                'post_id' => $post_id
            ]));
            rand(0, 1) ?
                $post->postImages()->saveMany(factory(App\Models\Entities\PostImage::class, rand(1, 3))->create([
                    'post_id' => $post_id
                ])) :
                $post->postVideo()->save(App\Models\Entities\PostVideo::class)->create([
                    'post_id' => $post_id
                ]);
        });
    }

    private function makeLeaderships($amount, $movement_id)
    {
        return factory(App\Models\Entities\Leadership::class, $amount)->create([
            'movement_id' => $movement_id
        ])
            ->each(function ($leadership) {
                $leadership->tribes()->saveMany($this->makeTribes(rand(1, 5), $leadership->id));
            });
    }

    private function makeTribes($amount, $leadership_id)
    {
        return factory(App\Models\Entities\Tribe::class, $amount)->create([
            'leadership_id' => $leadership_id
        ])
            ->each(function ($tribe) {
                $tribe->grades()->saveMany($this->makeGrades(rand(1, 7), $tribe['id']));
            });
    }

    private function makeGrades($amount, $tribe_id)
    {
        return factory(App\Models\Entities\Grade::class, $amount)->make([
            'tribe_id' => $tribe_id
        ]);
    }

}
