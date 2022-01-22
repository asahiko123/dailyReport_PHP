@extends('layouts.dashboard')
@section('content')
<div class="col-md-9 px-5 pt-5 mx-auto" id="card-contents">
        <form>
            <div class="form-group"required>
                <label for="FormTextarea">スタッフID</label>
                <textarea class="form-control" id="FormTextarea" rows="1" name="detail" ></textarea>
            </div>

            <div class="form-group"required>
                <label for="FormTextarea">氏名</label>
                <textarea class="form-control" id="FormTextarea" rows="1" name="detail" ></textarea>
            </div>

            <div class="form-group"required>
                <label for="FormTextarea">備考</label>
                <textarea class="form-control" id="FormTextarea" rows="3" name="detail" ></textarea>
            </div>

            <div class="form-group d-flex justify-content-center"required>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
</div>
@endsection
