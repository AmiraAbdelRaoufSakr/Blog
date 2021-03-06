<?php

namespace Database\Factories;


use App\Models\Post;
use Faker\Generator as Faker;
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
            'title' => $this->faker->text,
            'description' => $this->faker->sentence,
            'user_id' =>$this->faker->numberBetween($min = 1, $max =112)

        ];//has users
    }
   
    
}
