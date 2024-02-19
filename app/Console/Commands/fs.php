<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class fs extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:fs';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'fresh the database and seed it with default data';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->call('migrate:fresh');
        $this->call('db:seed');
    }
}
