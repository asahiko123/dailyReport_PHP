<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class DailyReport extends Model
{

    use SoftDeletes;

    protected $fillable = [
        'staff_id',
        'supplier_id',
        'work_id',
        'progress_id',
        'workday',
        'startTime',
        'endTime',
        'comment',
    ];

    public function stuff(){
        $this->belongsTo(Staff::class);
    }

    public function work(){
        $this->belongsTo(Work::class);
    }

    public function progress(){
        $this->belongsTo(Progress::class);
    }

    public function supplier(){
        $this->belongsTo(Supplier::class);
    }
}
