<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $table = 'groups';

    protected $fillable = ['name', 'description', 'teacher_id', 'assignment_id'];

    public function assignment()
    {
        return $this->belongsTo(Assignment::class);
    }

    public function students()
    {
        return $this->belongsToMany(User::class, 'group_student', 'group_id', 'student_id');
    }


    public function coordinator()
    {
        return $this->belongsTo(User::class, 'teacher_id', 'id');
    }


}
