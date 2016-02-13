<?php
/**
 * Created by PhpStorm.
 * User: idir
 * Date: 13/02/16
 * Time: 18:30
 */

namespace App\Commands;


use App\User;

class Step2Command
{
    /**
     * @var User
     */
    private $user;

    /**
     * Step2Command constructor.
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function getListTeacherAndCoordinators()
    {
        $users = $this->user->getTeacherAndCoordinators();
        $teachers = [];
        foreach ($users as $user) {
            $teachers[$user->id] = $user->name;

        }
        return $teachers;

    }

}