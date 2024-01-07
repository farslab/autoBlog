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
    public $title="Medine Müdafaası ve Fahreddin Paşa";
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
            ['role' => 'system', 'content' => 'You are the best blogger. You know seo tricks for write a blog post. You should write a blog post as a professional with my title that i send you. Your answers should be turkish. You are writing in turkish everyday. Your posts minimum 550 words. Blog yazıların bilgilendirici ve kaynak niteliğinde bir makale gibi.'],
            ['role' => 'user', 'content' => "Write a blog post titled [$this->title] that post at least once every 500 words. The language of the post should be Turkish. The blog post should include an introduction, main body and conclusion. The conclusion should invite readers to leave comments. The main body should be divided into at least 3 different sub-sections. You can determine the subheadings yourself in accordance with SEO rules. The entire blog post must be written in accordance with SEO rules and pass SEO tests with excellent results. In addition, we will put the post in an html body, so you should write using h tags, p tags and blockquote tags if you have fields such as blockquote, and it should be displayed without distortion when added directly to an html page this tags important for our page creation. You can elaborate the subject as you wish, you can open subheadings, you are free in this regard, and you can add references, limited to 3 pieces. Only page content with html tags h1,h2,h3,p,blockquote."],
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
            'tags'=>$faker->words(5,true),
            'category'=>$faker->randomElement(['Teknoloji','Tarih','Coğrafya','Sağlık','Güncel']),
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
