<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Kyslik\ColumnSortable\Sortable;

class DailyReport extends Model
{

    use SoftDeletes;
    use Sortable;

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

    public $sortable =[

        'staff_id',
        'supplier_id',
        'work_id',
        'progress_id',
        'workday',
        'startTime',
        'endTime',
        'created_at',
        'updated_at'

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
        return $this->with(['Staff','Supplier','Progress','WorkDiv.WorkType'])
                    ->sortable()
                    ->orderBy('id','DESC')
                    ->paginate(10);
    }

    public function getDailyReportById(Int $id){
        return $this->with(['Staff','Supplier','Progress','WorkDiv.WorkType'])
                    ->where('id',$id)
                    ->first();
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

    public function periodSearch(Array $data){

        return $this->with('Staff','WorkDiv.WorkType')->where('staff_id','=',$data['staff_id'])
                    ->whereDate('workday','>=',Carbon::parse($data['dayfrom'])->startOfDay())
                    ->whereDate('workday','<=',Carbon::parse($data['dayto'])->endOfDay())
                    ->sortable()
                    ->orderBy('id','DESC')
                    ->get();

    }

    public function periodSearchAll(Array $data){

        return $this->with('Staff','WorkDiv.WorkType')
                    ->whereDate('workday','>=',Carbon::parse($data['dayfrom'])->startOfDay())
                    ->whereDate('workday','<=',Carbon::parse($data['dayto'])->endOfDay())
                    ->orderBy('id','DESC')
                    ->get();
    }

    public function workTimeDiff(Object $data){

        $diff = [];

        for($i = 0; $i < count($data); $i++){

            $workTimeDiff = Carbon::parse($data[$i]['endTime'])->diffInMinutes(Carbon::parse($data[$i]['startTime']));
            $object = (object)[
                'staff' => $data[$i]['staff']['name'],
                'diff' => $workTimeDiff,
                'workType' => $data[$i]['WorkDiv']['WorkType']['work_type'],
            ];
            array_push($diff,$object);
        }

        return $diff;
    }


}
