<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class TestMail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:test-mail {email?}';

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
        $email = $this->argument('email') ?: 'test@example.com';
        \Mail::raw('Test email from Laravel', function ($message) use ($email) {
            $message->to($email)->subject('Test Mail');
        });
        $this->info('Test email sent to '.$email);
    }
}
