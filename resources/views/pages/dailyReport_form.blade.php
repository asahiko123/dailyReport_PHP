@extends('layouts.dashboard')
@section('content')

<div class="form-group px-5 pt-5" id="card-contents">
        <form>
            <div class="col-md-9 mx-auto">
                <div class="form-group">
                    <label for="timeSelected1">スタッフ名</label>
                    <select class="form-select" aria-label="Default select example">
                        <option selected>Open this select menu</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="timeSelected1">作業区分</label>
                    <select class="form-select" aria-label="Default select example">
                        <option selected>Open this select menu</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="timeSelected1">進捗度</label>
                    <select class="form-select" aria-label="Default select example">
                        <option selected>Open this select menu</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
            
                <div class="form-group">
                    <label for="timeSelected1">作業日時</label>
                    <input type ="date" class="form-control" name ="created" value =""id="timeSelected1"required>
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
                    <textarea class="form-control" id="FormTextarea" rows="3" name="detail" ></textarea>
                </div>
            

                <div class="form-group d-flex justify-content-center" required>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
</div>
@endsection
