<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Assignment extends Model
{
    use SoftDeletes;
    /**
     * @var string
     */
    protected $table = 'assignments';

    /**
     * @var array
     */
    protected $fillable = ['name', 'allow_change', 'teacher_id'];

    /**
     * @var array
     */
    protected $dates = ['deleted_at'];


    public function groups()
    {
        return $this->hasMany(Group::class, 'assignment_id', 'id');
    }

    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id', 'id');
    }

}
