<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class InitializeDatabase extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:initialize';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $this->migrate();
        $this->install_voyager();
        // $this->seed();
    }

    private function migrate()
    {
        Artisan::call('migrate:fresh');
        $this->line('migrate:fresh => completed');
    }
    
    private function install_voyager()
    {
        Artisan::call('voyager:install --with-dummy');
        $this->line('migrate:fresh => voyager with data');
    }

    // private function seed()
    // {
    //     Artisan::call('db:seed');
    // }
}
