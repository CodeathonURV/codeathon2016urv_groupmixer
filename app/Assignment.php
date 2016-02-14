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
        return $this->belongsToMany(Group::class, 'assignament_group');
    }

}
