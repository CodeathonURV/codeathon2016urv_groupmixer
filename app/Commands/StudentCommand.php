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
use App\Requests;
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
     * @var Requests
     */
    private $requests;


    /**
     * StudentCommand constructor.
     * @param User $user
     * @param Assignment $assignment
     * @param Requests $requests
     */
    public function __construct(User $user, Assignment $assignment, Requests $requests)
    {
        $this->user = $user;
        $this->assignment = $assignment;
        $this->requests = $requests;
    }


    public function getAssignments($userId)
    {
        $user = $this->user->find($userId);

        return $user->groups;
    }

    /**
     * @param $userId
     * @return array
     */
    public function getRequests($userId)
    {

        $user = $this->user->find($userId);


        $requests = [];

        foreach ($user->groups as $group) {
            $request = $this->requests->where('group_to_id', $group->id)->get();

            foreach ($request as $item) {
                $requests[] = $item;
            }

        }
        return $requests;

        /*
         dd($requests);
         dd($user->groups);
         $requests = [];
         $user = Auth::user();


         foreach ($user->groups as $group) {
             dd($group->assignments());
             $requests[] = [
                 'group_name' => $group->name
             ];
         }
         dd($requests);*/

    }

    public function getGroupsUnAssigned($groupId, $assigmentId)
    {
        $assigment = $this->assignment->find($assigmentId);


        return $assigment->groups()->where('id', '<>', $groupId)->get();

    }

    public function requestChange($group_to_id, $group_from_id, $studentId)
    {
        $result = $this->requests->create(
            [
                'group_from_id' => $group_from_id,
                'group_to_id' => $group_to_id,
                'student_id' => $studentId,
            ]
        );
        return $result;
    }

    public function executeChange($requestId)
    {
        $request = $this->requests->find($requestId);
        $userFrom = $this->user->find($request->student_id);
        $userTo = Auth::user();

        $userFrom->groups()->detach($request->group_from_id);
        $userTo->groups()->detach($request->group_to_id);

        $userFrom->groups()->attach($request->group_to_id);
        $userTo->groups()->attach($request->group_from_id);
        $request->delete();


    }
}