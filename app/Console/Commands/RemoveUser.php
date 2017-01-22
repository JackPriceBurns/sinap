<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;

class RemoveUser extends Command
{
    protected $signature = 'user:remove {email}';
    protected $description = 'Removes a user';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $user = User::where('email', $this->argument('email'))->first();

        if($user === null){
            throw new \Exception("User not found!");
        }

        $user->delete();
    }
}
