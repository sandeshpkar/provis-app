<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Post;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'title' => 'Some Post Title 1',
                'description' => 'Some Post description 1',
                'category' => 'Science',
                'status' => 1
            ],
            [
                'title' => 'Some Post Title 2',
                'description' => 'Some Post description 2',
                'category' => 'Technology',
                'status' => 1
            ],
            [
                'title' => 'Some Post Title 3',
                'description' => 'Some Post description 3',
                'category' => 'Food',
                'status' => 0
            ],
            [
                'title' => 'Some Post Title 4',
                'description' => 'Some Post description 4',
                'category' => 'Sports',
                'status' => 1
            ],
        ];

        foreach($data as $post){

            Post::updateOrCreate(
                [
                    'title' => $post['title'],
                    'description' => $post['description'],
                    'category' => $post['category'],
                ],
                [
                    'status' => $post['status']
                ],
            );

        }
    }
}
