@extends('layouts.dashboard')
@section('content')
<div class="col-md-9 px-3 pt-3 mx-auto" id="card-contents">
        <form>
            <div class="form-group"required>
                <label for="FormTextarea">作業区分ID</label>
                <textarea class="form-control" id="FormTextarea" rows="1" name="detail" ></textarea>
            </div>

            <div class="form-group"required>
            <label for="timeSelected1">作業区分</label>
                <select class="form-select" aria-label="Default select example">
                    <option selected>Open this select menu</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
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
