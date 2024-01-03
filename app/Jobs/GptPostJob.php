<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Database\Eloquent\Factories\Factory;


use App\Models\Post;
use Log;
use OpenAI\Laravel\Facades\OpenAI;

class GptPostJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $messages = [
            ['role' => 'system', 'content' => 'I am an SEO manager, This request is part of an SEO compatible content creation. Reply only with one title.'],
            ['role' => 'user', 'content' => 'About Camping blog post title'],
        ];
        $result = OpenAI::chat()->create([
            'model' => 'gpt-4',
            'messages' => $messages,
        ]);


        $postTitle = $result['choices'][0]['message'];

        Log::info($postTitle);


        try {
            $this->savePost($postTitle);
        } catch (\Throwable $th) {
            Log::info('Post Olusturulamadı');
        }

    }
    private function savePost($title)
    {

        $message = $title['content'] ?? '';
        $trimmedTitle = trim($message);


        // Post'u kaydetme işlemleri
        $data = [
            'title' => $trimmedTitle,
            'content' => 'gpt tarafından üretilen title ın contenti',
            // Diğer post özellikleri
        ];

        $faker = \Faker\Factory::create();
        Post::create([
            'title' => $trimmedTitle,
            'description' => $faker->paragraph,
            'content' => $faker->text,
            'meta_keywords' => $faker->words(5, true),
            'slug' => $faker->slug,
            'status' => $faker->randomElement(['published', 'draft']),
            'is_featured' => $faker->numberBetween(0, 1),
            'featured_image' => $faker->imageUrl(),
            'author' => $faker->name,
        ]);
        Log::info('Post olusturuldu GptApi');

    }
}
