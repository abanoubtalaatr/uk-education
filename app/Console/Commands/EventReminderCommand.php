<?php

namespace App\Console\Commands;

use App\Jobs\EventReminderJob;
use Illuminate\Console\Command;

class EventReminderCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'event:reminder';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        EventReminderJob::dispatch();
    }
}
