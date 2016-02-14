<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    protected $table = 'assignments';

    protected $fillable = ['name', 'allow_change', 'teacher_id'];

    public function groups()
    {
        return $this->belongsToMany(Group::class, 'assignament_group');
    }

}
