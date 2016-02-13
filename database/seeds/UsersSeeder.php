<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * @var User
     */
    private $user;

    /**
     * UsersSeeder constructor.
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $numUsers = 10;

        for ($i = 0; $i < $numUsers; $i++) {
            $name = str_random(7);
            $email = camel_case($name) . '@urv.cat';
            $dni = str_random(9);
            $password = Hash::make($name);
            $role = rand(1, 2);
            $this->user->createWithRole(compact('name', 'email', 'dni', 'password', 'role'));
        }


    }
}
