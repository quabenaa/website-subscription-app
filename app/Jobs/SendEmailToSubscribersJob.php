<?php

namespace App\Jobs;

use App\Mail\SendPostToWebsiteSubscribers;
use App\Models\Post;
use App\Models\WebsiteSubscription;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendEmailToSubscribersJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $post;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $email = new SendPostToWebsiteSubscribers($this->post);
        $subscribers = WebsiteSubscription::query()
                        ->findByWebsite($this->post->website)
                        ->get();

        foreach ($subscribers as $subscriber){
            Mail::to($subscriber->user->email)->send($email);
        }
    }
}
