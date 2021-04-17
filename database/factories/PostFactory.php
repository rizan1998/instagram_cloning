<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Support\Str;
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
        return [
            'image' =>  $this->faker->randomElement(['usertest2-1617015837.PNG', 'userexample1-1617074684.PNG', 'usertest2-1617006050.PNG']),
            'user_id' => $this->faker->numberBetween(1,3),
            'caption'=> $this->faker->realText(50),
            'created_at' => $this->faker->dateTimeBetween("-5 day" , now()),
        ];
    }
}
