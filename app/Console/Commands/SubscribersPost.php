<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class SubscribersPost extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:post-subscribers';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sends queued website posts its subscribers daily via email.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $exitCode = Artisan::call('queue:listen' );

        $this->info('Successfully sent post to subscribers.');
    }
}
