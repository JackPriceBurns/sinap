<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;
use App\Badge;

class CreateBadge extends Command
{

    protected $signature = 'badge:create {name} {email} {colour}';
    protected $description = 'Creates a badge';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $colour = $this->argument('colour');

        $user = User::where('email', $this->argument('email'))->first();

        if($user === null){
            throw new \Exception("The user '" . $this->argument('email') . "' could not be found!");
        }

        $colours = ['default', 'primary', 'success', 'info', 'warning', 'danger'];

        if(!in_array($colour, $colours)){
            throw new \Exception("The colour '" . $this->argument('colour') . "', is not a valid colour!");
        }

        $badge = new Badge();
        $badge->name = $this->argument('name');
        $badge->colour = $colour;
        $badge->user_id = $user->id;
        $badge->save();
    }
}
