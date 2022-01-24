<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Staff;
use App\Models\Supplier;
use App\Models\Progress;
use App\Models\WorkDiv;
use App\Models\DailyReport;

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

        return view('pages.dailyReport_form',compact('staffs','suppliers','progresses','workDivs','dailyReports'));
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
}
