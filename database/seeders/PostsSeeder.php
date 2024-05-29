<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Posts;
use App\Models\User;

class PostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         // Get all users
         $users = User::all();

         // Create 20 posts, assigning them to random users
         Posts::factory()->count(20)->make()->each(function ($post) use ($users) {
             $post->user_id = $users->random()->id;
             $post->save();
         });
    }
}
