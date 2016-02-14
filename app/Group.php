<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $table = 'groups';

    protected $fillable = ['name', 'description', 'teacher_id'];

    public function assignments()
    {
        return $this->belongsToMany(Assignment::class, 'assignament_group');
    }

    public function students()
    {
        return $this->belongsToMany(User::class, 'group_student', 'group_id', 'student_id');
    }

}
