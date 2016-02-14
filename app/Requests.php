<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Requests extends Model
{
    protected $table = 'requests';

    protected $fillable = [
        'group_from_id', 'group_to_id', 'student_id'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function groupFrom()
    {
        return $this->belongsTo(Group::class);
    }
}
