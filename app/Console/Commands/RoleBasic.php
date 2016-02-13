<?php

namespace App\Console\Commands;

use App\Commands\RoleCommand;
use Config;
use Exception;
use Illuminate\Console\Command;

class RoleBasic extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = "role:basic
                        {action=C : Create or delete all the basic permissions.}";
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create the basics roles (tutor,coordinator and student)';
    /**
     * @var RoleCommand
     */
    private $roleCommand;

    /**
     * RoleBasic constructor.
     * @param RoleCommand $roleCommand
     */
    public function __construct(RoleCommand $roleCommand)
    {
        parent::__construct();
        $this->roleCommand = $roleCommand;
    }

    /**
     * @throws Exception
     */
    public function handle()
    {
        $action = $this->argument('action');
        $roles = Config::get('roles.basic');

        try {
            switch (trim($action)) {
                case 'C':
                    foreach ($roles as $roleName => $role) {
                        $this->roleCommand->create($roleName, $role['level'], $role['description']);
                    }
                    break;
                case 'D':
                    foreach (array_keys($roles) as $roleName) {
                        $this->roleCommand->delete($roleName);
                    }
                    break;
            }
        } catch (Exception $e) {
            $this->error($e->getMessage());
        }
    }
}
