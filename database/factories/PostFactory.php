<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Post;
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
    protected $model = Post::class;

    public function definition(): array
    {
        $userId = Auth::user()->id;
        return [
            'thumbnail' => $this->faker->imageUrl(),
            'description'=>$this->faker->paragraph,
            'title' => $this->faker->sentence,
            'status' => $this->faker->randomElement([0, 1]),
        ];
    }
}
