<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    
    public function definition()
    {
        return [
            
             'image' => 'uploads/1713107096.coverPhoto.jpg',
             'title' => $this->faker->sentence,
             'description'=> $this->faker->paragraph,
             'category_id'=> Category::factory()
        ];
    }
}
