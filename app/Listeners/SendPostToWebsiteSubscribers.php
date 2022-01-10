<?php

namespace App\Listeners;

use App\Events\PostCreated;
use App\Jobs\SendEmailToSubscribersJob;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendPostToWebsiteSubscribers
{

    /**
     * Handle the event.
     *
     * @param  object $event
     * @return void
     */
    public function handle(PostCreated $event)
    {
        dispatch(new SendEmailToSubscribersJob($event->post));
    }
}
