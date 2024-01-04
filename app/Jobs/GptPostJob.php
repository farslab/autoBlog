<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Post;
use Log;
use OpenAI\Laravel\Facades\OpenAI;

class GptPostJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $title="Mustafa Kemal'in Samsun'a Çıkışı";
    public $resultImage="";

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
            ['role' => 'system', 'content' => 'You are the best blogger. You know seo tricks for write a blog post. You should write a blog post as a professional with my title that i send you. Your answers should be turkish.'],
            ['role' => 'user', 'content' => "$this->title= Başlık. Bu başlık ile SEO uyumlu bir blog postu yazmalı ve $this->title detaylarını anlatmalısın. Bu post 50 kelime civarında olmalı ve kesinliği doğrulanmış bilgilerden oluşmalı istersen blog sonunda 2-3 adet kaynak verebilirsin.Blog yazısını gönderirken h title etiketlerini kullanmalısın. p taglarını ve <br> taglarını kullanmalısın ve eğer alıntı yapacaksan blockquote taglarını kullanmalısın. html bir sayfaya bize verdiğin cevabı koydugumuzda sorunsuz bir sekilde h tagları p tagları calısıyor blockquoute tagları calısıyor olmalı. Yalnızca söylediğim taglarla bir content gönder. h1 h2 h3 p blockquote taglarını kullanabilirsin. göndereceğin cevap içinde bu taglar haricinde başında veya sonunda başka bir içerik bulunmamalı gönderdiğin içerik doğrudan blog postu olarak girilecek hazır bir sekilde gönder."],
        ];
        $result = OpenAI::chat()->create([
            'model' => 'gpt-4',
            'messages' => $messages,    
        ]);
        // $this->resultImage = OpenAI::chat()->create([
        //     'model' => 'dall-e-3',
        //     'prompt'=>"$this->title başlıklı bir blog postu için featured image olustur",
        //     'size'=>"768x576",
        //     'quality'=>"standard",
        //     'n'=>1,
        //     'timeout' => 120,
        // ]);


        $postTitle = $result['choices'][0]['message'];

        Log::info($postTitle);


        try {
            $this->savePost($postTitle);
        } catch (\Throwable $th) {
            Log::info('Post Olusturulamadı' .$th);
        }

    }
    private function savePost($title)
    {

        $message = $title['content'] ?? '';
        $trimmedContent = trim($message);

        $faker = \Faker\Factory::create();
        Post::create([
            'title' => $this->title,
            'description' => $faker->paragraph,
            'content' => $trimmedContent,
            'meta_keywords' => $faker->words(5, true),
            'slug' => $faker->slug,
            'status' => $faker->randomElement(['published', 'draft']),
            'is_featured' => $faker->numberBetween(0, 1),
            'featured_image' => " ",
            'author' => $faker->name,
        ]);
        Log::info('Post olusturuldu GptApi');

    }
}
