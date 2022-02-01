<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Staff;
use App\Models\Supplier;
use App\Models\Progress;
use App\Models\WorkDiv;
use App\Models\DailyReport;
use App\Exports\DailyReportExport;
use Maatwebsite\Excel\Facades\Excel;


class DailyReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(
        Staff $staff,
        Supplier $supplier,
        Progress $progress,
        WorkDiv $workDiv,
        DailyReport $dailyReport)
    {
        $staffs = $staff->getAllStaff();
        $suppliers = $supplier->getAllSupplier();
        $progresses = $progress->getAllProgress();
        $workDivs = $workDiv->getAllWorkDiv();

        $dailyReports = $dailyReport->getAllDailyReport();

        return view('dailyReport.index',compact('staffs','suppliers','progresses','workDivs','dailyReports'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,DailyReport $dailyReport)
    {
        $data = $request->all();

        $this->validate($request,[
            'staff_id' => 'required|integer|min:0',
            'work_id'  => 'required|integer|min:0',
            'progress_id' => 'required|integer|min:0',
            'supplier_id' => 'required|integer|min:0',
            'workday' => 'required|date',
            'startTime' => 'required',
            'endTime' => 'required',
            'comment' => 'required|min:10|max:200'
        ]);

        $dailyReport->storeDailyReport($data);


        return redirect('dailyReport');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function download(){

        $dailyReports = DailyReport::with(['Staff','Supplier','Progress','WorkDiv.WorkType'])->orderBy('id','DESC')->get();
        $view = view('dailyReport.download',compact('dailyReports'));
        return Excel::download(new DailyReportExport($view), 'dailyReport.xlsx');
     }
}
