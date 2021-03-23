<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker = $this->faker;
        $random_date = $faker->dateTimeBetween('-1year', '-1day');

        return [
          'title' => $faker->realText(rand(20, 50)),
          'body' => $faker->realText(rand(100, 20)),
          // trueやfalseを出す確率を操作できる
          'is_public' => $faker->boolean(90),
          'published_at' => $random_date,
          'created_at' => $random_date,
          'updated_at' => $random_date,
          'user_id' => $faker->numberBetween(1, 3),
        ];
    }
}
