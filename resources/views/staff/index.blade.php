@extends('layouts.dashboard')
@section('content')
<div class="col-md-9 px-5 pt-5 mx-auto" id="card-contents">
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
        <h1 class="h2">スタッフマスタ</h1>
    </div>
    <form method ="POST" action="{{route('staff.store')}}">
        @csrf
        <div class="form-group"required>
            <label for="FormTextarea">スタッフID</label>
            <textarea class="form-control" id="FormTextarea" rows="1" name="identification" >{{old('identification')}}</textarea>
        </div>

        <div class="form-group"required>
            <label for="FormTextarea">氏名</label>
            <textarea class="form-control" id="FormTextarea" rows="1" name="name" >{{old('name')}}</textarea>
        </div>

        <div class="form-group"required>
            <label for="FormTextarea">備考</label>
            <textarea class="form-control" id="FormTextarea" rows="3" name="comment">{{old('comment')}}</textarea>
        </div>

        <div class="form-group d-flex justify-content-center"required>
            <button type="submit" class="btn btn-outline-primary col-md-12">登録する</button>
        </div>
    </form>
    <table class="table table-striped col-md-9 mx-auto">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">スタッフID</th>
            <th scope="col">スタッフ名</th>
            <th scope="col">備考</th>
            </tr>
        </thead>
        @if(isset($staffs))
        <tbody>
            @foreach($staffs as $staff)
            <tr>
            <th scope="row"></th>
            <td data-label="スタッフID">{{$staff->identification}}</td>
            <td data-label="スタッフ名">{{$staff->name}}</td>
            <td data-label="備考">{{$staff->comment}}</td>
            </tr>
            @endforeach
        </tbody>
        @endif
    </table>
    <div class="d-flex justify-content-center">
        {{$staffs->links()}}
    </div>
</div>
@endsection
