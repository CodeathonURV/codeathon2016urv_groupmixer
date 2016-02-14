<?php
/**
 * Created by PhpStorm.
 * User: idir
 * Date: 14/02/16
 * Time: 11:14
 */

namespace App\Commands;


use App\Assignment;
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
     * @var Assignment
     */
    private $assignment;


    /**
     * StudentCommand constructor.
     * @param User $user
     * @param Assignment $assignment
     */
    public function __construct(User $user, Assignment $assignment)
    {
        $this->user = $user;
        $this->assignment = $assignment;
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

    public function getGroupsUnAssigned($groupId, $assigmentId)
    {
        $assigment = $this->assignment->find($assigmentId);


        return $assigment->groups()->where('id', '<>', $groupId)->get();

    }
}