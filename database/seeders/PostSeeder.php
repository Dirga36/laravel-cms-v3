<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();
        $categories = Category::all();

        // Pastikan ada user dan kategori dulu
        if ($users->count() === 0 || $categories->count() === 0) {
            $this->command->warn('User or Category not found. Seeding aborted.');

            return;
        }

        Post::factory(50)->make()->each(function ($post) use ($users, $categories) {
            $post->user_id = $users->random()->id;
            $post->category_id = $categories->random()->id;
            $post->save();
        });
    }
}
