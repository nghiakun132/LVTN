<?php

namespace App\Console\Commands;

use App\Models\Events;
use Illuminate\Console\Command;

class checkEvent extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'check:event';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check event when it is expired';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $event = Events::where('status', 0)->first();
        if ($event->end_date < date('Y-m-d H:i:s')) {
            $event->status = 1;
            $event->save();
        }
    }
}