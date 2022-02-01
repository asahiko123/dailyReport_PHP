@extends('layouts.dashboard')
@section('content')
<div class="col-md-9 px-3 pt-3 mx-auto" id="card-contents">
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
        <h1 class="h2">作業区分マスタ</h1>
    </div>
    <form method ="POST" action ="{{route('workDiv.store')}}">
        @csrf
        <div class="form-group"required>
            <label for="FormTextarea">作業区分ID</label>
            <textarea class="form-control" id="FormTextarea" rows="1" name="identification" required >{{old('identification')}}</textarea>
        </div>

        <div class="form-group"required>
        <label for="timeSelected1">作業区分</label>
            <select class="form-select" aria-label="Default select example" name="work_type_id">
                <option hidden>選択してください</option>
                @foreach($workTypes as $workType)
                <option value="{{$workType->id}}" @if(old('work_type_id') == $workType->id) selected @endif>{{$workType->work_type}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group"required>
            <label for="FormTextarea">備考</label>
            <textarea class="form-control" id="FormTextarea" rows="3" name="comment" >{{old('comment')}}</textarea>
        </div>

        <div class="form-group d-flex justify-content-center"required>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
    <table class="table table-striped col-md-9 mx-auto">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">作業区分ID</th>
            <th scope="col">作業区分</th>
            <th scope="col">備考</th>
            </tr>
        </thead>
        @if(isset($workDivs))
        <tbody>
            @foreach($workDivs as $workDiv)
            <tr>
            <th scope="row"></th>
            <td data-label="作業区分ID">{{$workDiv->identification}}</td>
            <td data-label="作業区分">{{$workDiv->WorkType->work_type}}</td>
            <td data-label="備考">{{$workDiv->comment}}</td>
            </tr>
            @endforeach
        </tbody>
        @endif
    </table>
    <div class="d-flex justify-content-center">
        {{$workDivs->links()}}
    </div>
</div>
@endsection
