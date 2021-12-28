<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Idea;
use App\Models\Tag;
use App\Models\User;
use App\Models\Vote;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        User::create([
            'username' => 'Ayman Tarig',
            'email' => 'ayman@awn.com',
            'password' => Hash::make('password'),
            'token' => Str::random(32)
        ]);
        $ideas = Idea::factory(10)->for(User::factory())->create();

        foreach ($ideas as $idea) {
            $idea->tags()->saveMany(Tag::factory(rand(1, 3))->create());
            Vote::factory(rand(1, 3))->for($idea)->create();
        }
    }
}
