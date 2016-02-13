<?php
namespace App\Commands;


use App\Formatters\UserFormatter;
use App\User;
use Auth;
use Hash;
use Redirect;

class LoginCommand
{
    /**
     * @var UserFormatter
     */
    private $userFormatter;
    /**
     * @var User
     */
    private $user;


    /**
     * LoginCommand constructor.
     * @param UserFormatter $userFormatter
     * @param User $user
     */
    public function __construct(UserFormatter $userFormatter, User $user)
    {
        $this->userFormatter = $userFormatter;
        $this->user = $user;
    }

    /**
     * @param array $all
     * @return $this
     */
    public function save(array $all)
    {
        $userArray = $this->userFormatter->fromLogin($all);
        return $this->user->createWithRole($userArray);
    }

    public function checkLogin($all)
    {
        if (Auth::attempt(['dni' => $all['dni'], 'password' => $all['password']])) {
            return true;
        }

        return false;
    }
}