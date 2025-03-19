<?php

namespace Database\Factories;

use App\Http\Enums\PostStatus;
use App\Models\User;
use App\Traits\HasMockTrait;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    use HasMockTrait;
    
    public function definition()
    {
        $this->faker->seed($this->seedId++);
        return [
            'title' => fake()->sentence(),
            'content' => $this->generateContent(),
            'author_id' => User::first()->id,
            'status' => PostStatus::PUBLISH,
        ];
    }

    private function generateContent($chapter = 3, $post = '') {
        $paragraphs = $this->faker->paragraphs(rand(2, 6));
        $title = $this->faker->realText(50);
        $post = "<h2>{$title}</h2>";
        foreach ($paragraphs as $para) {
            $post .= "<p>{$para}</p>";
        }

        if($chapter > 0) {
            return $post .= $this->generateContent($chapter-1, $post);
        } else {
            return $post;
        }
    }
}
