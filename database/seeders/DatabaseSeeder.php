<?php

namespace Database\Seeders;

use Database\Factories\CategoryFactory;
use Database\Factories\CommentFactory;
use Database\Factories\PostFactory;
use Database\Factories\PostTagFactory;
use Database\Factories\TagFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class
        ]);

        CategoryFactory::times(10)->create();

        TagFactory::times(10)->create();

        PostFactory::times(40)->create();

        CommentFactory::times(60)->create();

    }
}
