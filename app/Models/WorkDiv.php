<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorkDiv extends Model
{
    protected $table = 'work';
    protected $fillable = [
        'work_type_id',
        'identification',
        'comment'
    ];

    public function workType(){
        return $this->belongsTo(WorkType::class);
    }

    public function getAllWorkDiv(){
        return $this->with('WorkType')->get();
    }
}
