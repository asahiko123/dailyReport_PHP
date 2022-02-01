<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DailyReport;
use App\Models\Staff;
use App\Exports\DailyReportExport;
use Maatwebsite\Excel\Facades\Excel;

class LaborMgtController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(DailyReport $dailyReport,Staff $staff)
    {
        $dailyReports = $dailyReport->getAllDailyReport();
        $staffs = $staff->getAllStaff();
        return view('pages.ms_labor_mgt',compact('dailyReports','staffs'));
    }

    /**
     * データの検索を実行
     */

    public function search(DailyReport $dailyReport,Staff $staff,Request $request){

        $inputs = $request->all();
        $searchlists = $dailyReport->periodSearch($inputs);
        $search_json = json_encode(['searchlist' => $searchlists]);

        $searchAll = $dailyReport->periodSearchAll($inputs);
        $searchAll_json = json_encode($searchAll);

        $diffAll = $dailyReport->workTimeDiff($searchAll);
        $diffAll_json = json_encode($diffAll);

        $diff = $dailyReport->workTimeDiff($searchlists);
        $diff_json = json_encode($diff);

        $staffs = $staff->getAllStaff();

        return view('pages.ms_labor_mgt',compact('searchlists','staffs','search_json','diff_json','diffAll_json','searchAll_json'));
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
    public function store(Request $request)
    {
        //
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

    public function download(DailyReport $dailyReport,Request $request){

        $inputs = $request->all();
        $searchlists = $dailyReport->periodSearch($inputs);

        $view = view('pages.searchdownload',compact('searchlists'));
        return Excel::download(new DailyReportExport($view), 'searchlists.xlsx');
    }
}
