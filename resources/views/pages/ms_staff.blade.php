@extends('layouts.dashboard')
@section('content')
<div class="col-md-9 px-5 pt-5 mx-auto" id="card-contents">
    <form method ="POST" action="{{route('staff.store')}}">
        @csrf
        <div class="form-group"required>
            <label for="FormTextarea">スタッフID</label>
            <textarea class="form-control" id="FormTextarea" rows="1" name="identification" ></textarea>
        </div>

        <div class="form-group"required>
            <label for="FormTextarea">氏名</label>
            <textarea class="form-control" id="FormTextarea" rows="1" name="name" ></textarea>
        </div>

        <div class="form-group"required>
            <label for="FormTextarea">備考</label>
            <textarea class="form-control" id="FormTextarea" rows="3" name="comment" ></textarea>
        </div>

        <div class="form-group d-flex justify-content-center"required>
            <button type="submit" class="btn btn-primary">Submit</button>
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
            <th scope="row">{{$staff->id}}</th>
            <td data-label="スタッフID">{{$staff->identification}}</td>
            <td data-label="スタッフ名">{{$staff->name}}</td>
            <td data-label="備考">{{$staff->comment}}</td>
            </tr>
            @endforeach
        </tbody>
        @endif
    </table>
</div>
@endsection