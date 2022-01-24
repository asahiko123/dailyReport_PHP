<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;
use Illuminate\Http\Request;

class DailyReport extends Model
{

    use SoftDeletes;

    protected $table = 'daily_report';

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

    public function staff(){
        return $this->belongsTo(Staff::class);
    }

    public function workdiv(){
        return $this->belongsTo(WorkDiv::class,'work_id');
    }

    public function progress(){
        return $this->belongsTo(Progress::class);
    }

    public function supplier(){
        return $this->belongsTo(Supplier::class);
    }

    public function getAllDailyReport(){
        return $this->with(['Staff','Supplier','Progress','WorkDiv.WorkType'])->get();
    }

    public function storeDailyReport(Array $data){

        $this->staff_id = $data['staff_id'];
        $this->supplier_id = $data['supplier_id'];
        $this->work_id = $data['work_id'];
        $this->progress_id = $data['progress_id'];
        $this->workday = $data['workday'];
        $this->startTime = $data['startTime'];
        $this->endTime = $data['endTime'];
        $this->comment = $data['comment'];

        $this->save();

        return;
    }


}
