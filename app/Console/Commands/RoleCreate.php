<?php

namespace App\Console\Commands;

use App\Commands\RoleCommand;
use Illuminate\Console\Command;

class RoleCreate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = "role:create
                        {name : Name of the new role.}
                        {level=1 : Level of the role. The lower (limited permission) is the level 1 and the highest is the 5.}
                        {description='' : Description of the role.}";

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';
    /**
     * @var RoleCommand
     */
    private $roleCommand;

    /**
     * RoleCreate constructor.
     * @param RoleCommand $roleCommand
     */
    public function __construct(RoleCommand $roleCommand)
    {
        parent::__construct();
        $this->roleCommand = $roleCommand;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $name = $this->argument('name');
        $description = $this->argument('description');
        $level = $this->argument('level');
        $this->roleCommand->create($name, $description, $level);

    }
}
