@extends('layouts.dashboard')
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
        <h1 class="h2">日報入力フォーム</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
            @if(isset($dailyReports))
            <button type="button" onclick="location.href='{{ route('dailyReport.download') }}'" class="btn btn-sm btn-outline-secondary">
            <span data-feather="file"></span>
            Excel
            </button>
            @endif
            </div>
        </div>
    </div>
    <form method = "POST" action ="{{route('dailyReport.store')}}">
        @csrf
        <div class="col-md-9 mx-auto">
            <div class="form-group">
                <label for="timeSelected1">スタッフ名</label>
                <select class="form-select" aria-label="Default select example" name="staff_id">
                    <option hidden>選択してください</option>
                    @foreach($staffs as $staff)
                    <option value="{{$staff->id}}"@if(old('staff_id') == $staff->id) selected @endif>{{$staff->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="timeSelected1">作業区分</label>
                <select class="form-select" aria-label="Default select example"name="work_id">
                    <option hidden>選択してください</option>
                    @foreach($workDivs as $workDiv)
                    <option value="{{$workDiv->id}}" @if(old('work_id') == $workDiv->id) selected @endif>{{$workDiv->WorkType->work_type}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="timeSelected1">進捗度</label>
                <select class="form-select" aria-label="Default select example"name="progress_id">
                    <option hidden>選択してください</option>
                    @foreach($progresses as $progress)
                    <option value="{{$progress->id}}" @if(old('progress_id') == $progress->id) selected @endif>{{$progress->persent}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="timeSelected1">案件名</label>
                <select class="form-select" aria-label="Default select example"name="supplier_id">
                    <option hidden>選択してください</option>
                    @foreach($suppliers as $supplier)
                    <option value="{{$supplier->id}}" @if(old('supplier_id') == $supplier->id) selected @endif>{{$supplier->supplier}}_{{$supplier->project}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="timeSelected1">作業日時</label>
                <input type ="date" class="form-control" name ="workday" value ="{{old('workday')}}"id="timeSelected1"required>
            </div>

            <div class="form-group">
                <label for="timeSelected2">開始時刻</label>
                <input type ="time"class="form-control" name ="startTime" value ="{{old('startTime')}}"id="timeSelected2"required>
            </div>

            <div class="form-group">
                <label for="timeSelected3">終了時刻</label>
                <input type ="time"class="form-control" name ="endTime" value ="{{old('endTime')}}"id="timeSelected3"required>
            </div>


            <div class="form-group"required>
                <label for="FormTextarea">日報内容</label>
                <textarea class="form-control" id="FormTextarea" rows="3" name="comment">{{old('comment')}}</textarea>
            </div>


            <div class="form-group d-flex justify-content-center" required>
                <button type="submit" class="btn btn-outline-primary col-md-12">登録する</button>
            </div>
        </div>
    </form>
    <table class="table table-striped col-md-9 mx-auto">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">スタッフ名</th>
            <th scope="col">作業区分</th>
            <th scope="col">進捗度</th>
            <th scope="col">案件名</th>
            <th scope="col">作業日時</th>
            <th scope="col">開始時刻</th>
            <th scope="col">終了時刻</th>
            <th scope="col">日報内容</th>
            <th scope="col"></th>
            <th scope="col"></th>
            </tr>
        </thead>
        @if(isset($dailyReports))
        <tbody>
            @foreach($dailyReports as $dailyReport)
            <tr>
            <th scope="row"></th>
            <td data-label="スタッフ名">{{$dailyReport->Staff->name}}</td>
            <td data-label="作業区分">{{$dailyReport->WorkDiv->WorkType->work_type}}</td>
            <td data-label="進捗度">{{$dailyReport->Progress->persent}}</td>
            <td data-label="案件名">{{$dailyReport->Supplier->supplier}}_{{$dailyReport->Supplier->project}}</td>
            <td data-label="作業日時">{{$dailyReport->workday}}</td>
            <td data-label="開始時刻">{{$dailyReport->startTime}}</td>
            <td data-label="終了時刻">{{$dailyReport->endTime}}</td>
            <td data-label="日報内容">{{$dailyReport->comment}}</td>
            <td><button class="btn btn-outline-success" onclick="location.href='{{route('dailyReport.edit',['id' => $dailyReport->id])}}'"><span data-feather="edit"></button></td>
            <td>
            <form method ="POST" action ="{{route('dailyReport.delete',['id' => $dailyReport->id])}}"name="formdelete">
                @csrf
                <button type="submit" class="btn btn-outline-danger"><span data-feather="trash-2"></span></button>
            </form>
            </td>
            </tr>
            @endforeach
        </tbody>
        @endif
    </table>
    <div class="d-flex justify-content-center">
        {{$dailyReports->links()}}

    </div>
</div>
@endsection
