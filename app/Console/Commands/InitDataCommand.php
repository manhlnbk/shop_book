<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class InitDataCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:init-data';

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
        $user = User::count();
        if ($user !== 0) return;

        $fileName = public_path('data/laravel_shop.sql');
        $file_exists = file_exists($fileName);
        if (!$file_exists) return;

        \Artisan::call('db:seed --class=DatabaseSeeder');
        DB::unprepared(file_get_contents($fileName));
    }
}
