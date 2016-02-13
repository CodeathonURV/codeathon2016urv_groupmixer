<?php


namespace App\Formatters;


use App\User;
use Config;
use Hash;

class UserFormatter
{
    /**
     * @var User
     */
    private $user;


    /**
     * UserFormatter constructor.
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * @param array $all
     * @return array
     */
    public function fromLogin(array $all)
    {
        $result = [];
        foreach (Config::get('formatter.user.login_to_model') as $loginField => $modelName) {
            if (!empty($all[$loginField])) {
                if ($modelName == 'password') {
                    $all[$loginField] = Hash::make($all[$loginField]);
                }
                $result[$modelName] = $all[$loginField];
            }
        }

        return $result;
    }

}