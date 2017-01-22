<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;
use App\Role;
use App\Classes\Hash;

class CreateUser extends Command
{
    protected $signature = 'user:add {name} {email} {password} {role=Student}';
    protected $description = 'Creates a new user';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $user = new User();
        $user->name = $this->argument('name');
        $user->email = $this->argument('email');

        $hash = Hash::hash($this->argument('password'));

        $user->password = $hash['hash'];
        $user->password_salt = $hash['salt'];

        $role = Role::where('name', $this->argument('role'))->first();

        if($role === null) {
            throw new \Exception("The role '" . $this->argument('role') . "' could not be found!");
        }

        $user->role_id = json_decode($role)->id;

        $user->save();
    }
}
