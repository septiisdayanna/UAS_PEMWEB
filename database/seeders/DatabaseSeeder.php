<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Role;
use App\Models\Post;
use App\Models\Category;
// use App\Models\CategoryPost;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // Create roles
        // $adminRole = Role::factory()->create(['name' => 'admin']);
        // $pengelolaRole = Role::factory()->create(['name' => 'pengelola']);

        // Create users
        // User::factory(1)->create(['role_id' => $pengelolaRole->id]);
        // User::factory(1)->create(['role_id' => $adminRole->id]);

        // Create categories
        // $categories = Category::factory(3)->create();

        // Create posts and associate with categories
        // Post::factory(3)->create()->each(function ($post) use ($categories) {
        //     $post->categories()->attach(
        //         $categories->random(rand(1, 3))->pluck('id')->toArray()
        //     );
        // });

        //Create Config
        $this->call([
            ConfigSeeder::class,
        ]);
    }
}
