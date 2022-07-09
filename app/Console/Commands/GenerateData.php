<?php

namespace App\Console\Commands;

use Exception;
use Illuminate\Console\Command;

class GenerateData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate:data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Insert the generated data into the database';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $this->info('Starting first file');

        $this->withProgressBar(collect(require base_path('First.php')), function($item) {
            try {
                $item[0]();
            } catch(Exception $e) {
                $this->error('Failed: ' . $e->getMessage());
            }
        });

        $this->info('Starting second file');

        $this->withProgressBar(collect(require base_path('Second.php')), function($item) {
            try {
                $item[0]();
            } catch(Exception $e) {
                $this->error('Failed: ' . $e->getMessage());
            }
        });
    }
}
