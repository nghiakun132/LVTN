<?php

namespace App\Console\Commands;

use App\Models\Comment;
use Illuminate\Console\Command;

class checkCommnent extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'check:comment';
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check comment';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $comments = Comment::all();
        foreach ($comments as $comment) {
            if ($comment->status == 0) {
                $comment->status = 1;
                $comment->save();
            }
        }
    }
}
