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
        <h1 class="h2">取引先マスタ</h1>
    </div>
    <form method ="POST" action ="{{route('supplier.store')}}">
        @csrf
        <div class="form-group"required>
            <label for="FormTextarea">取引先</label>
            <textarea class="form-control" id="FormTextarea" rows="1" name="supplier">{{old('supplier')}}</textarea>
        </div>

        <div class="form-group"required>
            <label for="FormTextarea">案件名</label>
            <textarea class="form-control" id="FormTextarea" rows="1" name="project">{{old('project')}}</textarea>
        </div>

        <div class="form-group d-flex justify-content-center"required>
            <button type="submit" class="btn btn-outline-primary col-md-12">登録する</button>
        </div>
    </form>
    <table class="table table-striped col-md-9 mx-auto">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">取引先</th>
            <th scope="col">案件名</th>
            </tr>
        </thead>
        @if(isset($suppliers))
        <tbody>
            @foreach($suppliers as $supplier)
            <tr>
            <th scope="row"></th>
            <td data-label="取引先">{{$supplier->supplier}}</td>
            <td data-label="スタッフ名">{{$supplier->project}}</td>
            </tr>
            @endforeach
        </tbody>
        @endif
    </table>
    <div class="d-flex justify-content-center">
        {{$suppliers->links()}}
    </div>
</div>
@endsection
