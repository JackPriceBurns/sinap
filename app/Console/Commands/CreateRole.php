<?php

namespace App\Console\Commands;

use App\Role;
use Illuminate\Console\Command;

class CreateRole extends Command
{
    protected $signature = 'role:add {name}';
    protected $description = 'Creates a new role';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $role = new Role();
        $role->name = $this->argument('name');
        $role->save();
    }
}
