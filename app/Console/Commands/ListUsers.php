<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;

class ListUsers extends Command
{
    protected $signature = 'user:list';
    protected $description = 'Command description';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $users = User::get();
        $this->info($users);
    }
}
