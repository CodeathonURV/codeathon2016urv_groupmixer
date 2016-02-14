<?php
/**
 * Created by PhpStorm.
 * User: idir
 * Date: 14/02/16
 * Time: 11:14
 */

namespace App\Commands;


use App\User;
use Auth;

class StudentCommand
{
    /**
     * @var User
     */
    private $user;

    /**
     * StudentCommand constructor.
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
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