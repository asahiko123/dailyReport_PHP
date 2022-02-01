@extends('layouts.app')
@section('content')

<div class="form-group px-5 pt-5" id="card-contents">

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">日報更新フォーム</h1>
    </div>

    <form method = "POST" action ="{{route('dailyReport.update',['id' => $dailyReports->id])}}">
        @csrf
        <div class="col-md-9 mx-auto">
            <div class="form-group">
                <label for="timeSelected1">スタッフ名</label>
                <select class="form-select" aria-label="Default select example" name="staff_id">
                    <option hidden>選択してください</option>
                    @foreach($staffs as $staff)
                    <option value="{{$staff->id}}"@if($dailyReports->Staff->id == $staff->id) selected @endif>{{$staff->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="timeSelected1">作業区分</label>
                <select class="form-select" aria-label="Default select example"name="work_id">
                    <option hidden>選択してください</option>
                    @foreach($workDivs as $workDiv)
                    <option value="{{$workDiv->id}}" @if($dailyReports->workDiv->id == $workDiv->id) selected @endif>{{$workDiv->WorkType->work_type}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="timeSelected1">進捗度</label>
                <select class="form-select" aria-label="Default select example"name="progress_id">
                    <option hidden>選択してください</option>
                    @foreach($progresses as $progress)
                    <option value="{{$progress->id}}" @if($dailyReports->progress->id == $progress->id) selected @endif>{{$progress->persent}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="timeSelected1">案件名</label>
                <select class="form-select" aria-label="Default select example"name="supplier_id">
                    <option hidden>選択してください</option>
                    @foreach($suppliers as $supplier)
                    <option value="{{$supplier->id}}" @if($dailyReports->supplier->id == $supplier->id) selected @endif>{{$supplier->supplier}}_{{$supplier->project}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="timeSelected1">作業日時</label>
                <input type ="date" class="form-control" name ="workday" value ="{{$dailyReports->workday}}"id="timeSelected1"required>
            </div>

            <div class="form-group">
                <label for="timeSelected2">開始時刻</label>
                <input type ="time"class="form-control" name ="startTime" value ="{{$dailyReports->startTime}}"id="timeSelected2"required>
            </div>

            <div class="form-group">
                <label for="timeSelected3">終了時刻</label>
                <input type ="time"class="form-control" name ="endTime" value ="{{$dailyReports->endTime}}"id="timeSelected3"required>
            </div>


            <div class="form-group"required>
                <label for="FormTextarea">日報内容</label>
                <textarea class="form-control" id="FormTextarea" rows="3" name="comment">{{$dailyReports->comment}}</textarea>
            </div>


            <div class="form-group d-flex justify-content-center" required>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>

</div>
@endsection
