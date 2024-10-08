<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' =>strtoupper(fake()->words(3, true)),
            'url_clean' => fake()->url(),
            'content' => fake()->paragraphs(2, true),
            'posted' => fake()->randomElement(['yes', 'not']),
            'category_id' => Category::take(6)->get()->random()->id,
            'user_id' => User::all()->random()->id,
        ];
    }

    /**
     * Configure the factory to assign tags to the post after creation.
     *
     * @return $this
     */
    public function configure()
    {
        return $this->afterCreating(function (Post $post) {
            // Asignar de 1 a 5 etiquetas aleatorias al post
            $tags = Tag::all()->random(rand(1, 5));
            $post->tags()->attach($tags);
        });
    }
}
