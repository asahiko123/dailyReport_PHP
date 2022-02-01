<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WorkDiv;
use App\Models\WorkType;


class WorkDivController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(WorkDiv $workDiv,WorkType $workType)
    {
        $workDivs = $workDiv->getAllWorkDiv();
        $workTypes = $workType->getAllWorkType();

        return view('workDiv.index',compact('workDivs','workTypes'));
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
    public function store(Request $request,WorkDiv $workDiv)
    {
        $workDiv->work_type_id = $request->input('work_type_id');
        $workDiv->identification = $request->input('identification');
        $workDiv->comment = $request->input('comment');

        $this->validate($request,[
            'identification' => 'required|string',
            'work_type_id' => 'required|integer|min:0',
            'comment' => 'max:100'
        ]);

        $workDiv->save();

        return redirect('workDiv');
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
