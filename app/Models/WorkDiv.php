<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorkDiv extends Model
{
    protected $fillable = [
        'work_type_id',
        'identification',
        'comment'
    ];

    public function workType(){
        $this->belongsTo(WorkType::class);
    }
}
