@extends('layouts.dashboard')
@section('content')
<div class="col-md-9 px-3 pt-3 mx-auto" id="card-contents">
    <form method ="POST" action ="{{route('supplier.store')}}">
        @csrf
        <div class="form-group"required>
            <label for="FormTextarea">取引先</label>
            <textarea class="form-control" id="FormTextarea" rows="1" name="supplier"></textarea>
        </div>

        <div class="form-group"required>
            <label for="FormTextarea">案件名</label>
            <textarea class="form-control" id="FormTextarea" rows="1" name="project"></textarea>
        </div>

        <div class="form-group d-flex justify-content-center"required>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>
@endsection
