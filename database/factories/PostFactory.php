<?php

namespace Database\Factories;

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
      //各カラムにどの様な情報を入れるのかの条件を指定する
        return [
          'title' => fake()->text(20), //titleカラムに20字以内の文字列データをいれる
          'body' => fake()->text(50),
          'user_id' => \App\Models\User::factory(), //post作成時に新しいuserを作成して、user_idには、そのuserのidを入れる指定
        ];
    }
}
