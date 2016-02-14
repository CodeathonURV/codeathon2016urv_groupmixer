<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * App\User
 *
 * @property integer $id
 * @property string $name
 * @property string $email
 * @property string $dni
 * @property string $password
 * @property string $remember_token
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 */
class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'dni'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function groups()
    {
        return $this->belongsToMany(Group::class, 'group_student', 'student_id');
    }

    /**
     * @param array $user
     * @return $this
     */
    public function createWithRole(array $user)
    {
        $roleId = $user['role'];
        unset($user['role']);
        $user = $this->create($user);

        $user->attachRole($roleId);

        return $this;
    }

    public function getTeacherAndCoordinators($filtered = null)
    {
        $users = $this->whereHas('roles', function ($query) {
            $query->orWhere('roles.id', '=', '2');
            $query->where('roles.id', '=', '1');
        });
        if ($filtered) {
            $users = $this->get($filtered);
        } else {
            $users = $this->get();
        }

        return $users;
    }


}
