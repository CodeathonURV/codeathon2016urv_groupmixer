<?php

namespace App\Console\Commands;

use App\Commands\RoleCommand;
use Illuminate\Console\Command;

class RoleDelete extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = "role:delete";

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
     * Create a new command instance.
     *
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
        if ($this->confirm('Do you want list the existing roles? [y|N]')) {
            $headers = ['Name', 'Level'];
            $roles = $this->roleCommand->getAll(['name', 'level'])->toArray();
            $this->table($headers, $roles);
        }

        $name = $this->ask('Which role do you want to delete ?');
        if ($this->confirm('Do you wish to continue? [y|N]')) {
            $this->roleCommand->delete($name);
        }

    }
}
