<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;
use function Pest\Laravel\post;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Post::factory(10)->create();
          Post::factory()->create([
            'title' => 'title',
            'user_id' => '12',
            'description' => 'description',
        ]);
        //
    }
}
