@extends('layouts.dashboard')
@section('content')

<div class="form-group px-5 pt-5" id="card-contents">
    <form method = "POST" action ="{{route('dailyReport.store')}}">
        @csrf
        <div class="col-md-9 mx-auto">
            <div class="form-group">
                <label for="timeSelected1">スタッフ名</label>
                <select class="form-select" aria-label="Default select example" name="staff_id">
                    <option hidden>選択してください</option>
                    @foreach($staffs as $staff)
                    <option value="{{$staff->id}}">{{$staff->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="timeSelected1">作業区分</label>
                <select class="form-select" aria-label="Default select example"name="work_id">
                    <option hidden>選択してください</option>
                    @foreach($workDivs as $workDiv)
                    <option value="{{$workDiv->id}}">{{$workDiv->WorkType->work_type}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="timeSelected1">進捗度</label>
                <select class="form-select" aria-label="Default select example"name="progress_id">
                    <option hidden>選択してください</option>
                    @foreach($progresses as $progress)
                    <option value="{{$progress->id}}">{{$progress->persent}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="timeSelected1">案件名</label>
                <select class="form-select" aria-label="Default select example"name="supplier_id">
                    <option hidden>選択してください</option>
                    @foreach($suppliers as $supplier)
                    <option value="{{$supplier->id}}">{{$supplier->supplier}}_{{$supplier->project}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="timeSelected1">作業日時</label>
                <input type ="date" class="form-control" name ="workday" value =""id="timeSelected1"required>
            </div>

            <div class="form-group">
                <label for="timeSelected2">開始時刻</label>
                <input type ="time"class="form-control" name ="startTime" value =""id="timeSelected2"required>
            </div>

            <div class="form-group">
                <label for="timeSelected3">終了時刻</label>
                <input type ="time"class="form-control" name ="endTime" value =""id="timeSelected3"required>
            </div>


            <div class="form-group"required>
                <label for="FormTextarea">日報内容</label>
                <textarea class="form-control" id="FormTextarea" rows="3" name="comment" ></textarea>
            </div>


            <div class="form-group d-flex justify-content-center" required>
                <button type="submit" class="btn btn-primary">Submit</button>
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
            </tr>
        </thead>
        @if(isset($dailyReports))
        <tbody>
            @foreach($dailyReports as $dailyReport)
            <tr>
            <th scope="row">{{$dailyReport->id}}</th>
            <td data-label="スタッフ名">{{$dailyReport->Staff->name}}</td>
            <td data-label="作業区分">{{$dailyReport->WorkDiv->WorkType->work_type}}</td>
            <td data-label="進捗度">{{$dailyReport->Progress->persent}}</td>
            <td data-label="案件名">{{$dailyReport->Supplier->supplier}}_{{$dailyReport->Supplier->project}}</td>
            <td data-label="作業日時">{{$dailyReport->workday}}</td>
            <td data-label="開始時刻">{{$dailyReport->startTime}}</td>
            <td data-label="終了時刻">{{$dailyReport->endTime}}</td>
            <td data-label="日報内容">{{$dailyReport->comment}}</td>
            </tr>
            @endforeach
        </tbody>
        @endif
    </table>
</div>
@endsection
