@extends('layouts.dashboard')
@section('content')
<div class="form-group px-5 pt-5" id="card-contents">
        <form>
            <div class="form-group col-lg-5"required>
                <label for="FormTextarea">取引先</label>
                <textarea class="form-control" id="FormTextarea" rows="1" name="detail" ></textarea>
            </div>

            <div class="form-group col-lg-5"required>
                <label for="FormTextarea">案件名</label>
                <textarea class="form-control" id="FormTextarea" rows="1" name="detail" ></textarea>
            </div>

            <div class="form-group col-lg-5"required>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
</div>
@endsection