<?php


namespace App\Commands;


use App\Assignment;
use App\Group;
use App\User;
use Cache;

class Step3Command
{
    /**
     * @var Assignment
     */
    private $assignment;
    /**
     * @var Group
     */
    private $group;
    /**
     * @var User
     */
    private $user;

    /**
     * Step3Command constructor.
     * @param Assignment $assignment
     * @param Group $group
     * @param User $user
     */
    public function __construct(Assignment $assignment, Group $group, User $user)
    {
        $this->assignment = $assignment;
        $this->group = $group;
        $this->user = $user;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getParameters($id)
    {
        $assignments = $this->assignment->find($id);

        return $assignments;
    }

}