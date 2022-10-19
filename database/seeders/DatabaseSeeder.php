<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Article;
use App\Models\Category;
use App\Models\Comment;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Article::factory(20)->create();
        Comment::factory(40)->create();



        Category::factory()->create([
            'id' => 1,
            'name' => 'General',
        ]);
        Category::factory()->create([
            'id' => 2,
            'name' => 'Technology',
        ]);
        Category::factory()->create([
            'id' => 3,
            'name' => 'Mobile',
        ]);
        Category::factory()->create([
            'id' => 4,
            'name' => 'Computer',
        ]);
        Category::factory()->create([
            'id' => 5,
            'name' => 'NEWS',
        ]);

        User::factory()->create([
            'name' => 'King Bob' ,
            'email' => 'kingbob@gmail.com',
        ]);

        User::factory()->create([
            'name' => 'Alice',
            'email' => 'alice@gmail.com',
        ]);

        User::factory()->create([
            'name' => 'Jack',
            'email' => 'jack@gmail.com',
        ]);
        // \App\Models\User::factory(10)->create();
    }
}
