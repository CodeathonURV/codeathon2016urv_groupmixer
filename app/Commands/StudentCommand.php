<?php
/**
 * Created by PhpStorm.
 * User: idir
 * Date: 14/02/16
 * Time: 11:14
 */

namespace App\Commands;


use App\Group;
use App\User;
use Auth;

class StudentCommand
{
    /**
     * @var User
     */
    private $user;
    /**
     * @var Group
     */
    private $group;

    /**
     * StudentCommand constructor.
     * @param User $user
     * @param Group $group
     */
    public function __construct(User $user, Group $group)
    {
        $this->user = $user;
        $this->group = $group;
    }


    public function getAssignments($userId)
    {
        $user = $this->user->find($userId);

        return $user->groups;
    }

    /**
     * @param $userId
     */
    public function getRequests($userId)
    {
        $result = [];
        $user = Auth::user();


        foreach ($user->groups as $group) {
            dd($group->assignments());
            $result[] = [
                'group_name' => $group->name
            ];
        }
        dd($result);

    }
}