@extends('layouts.dashboard')
@section('content')
@section('scripts')
    @parent
    <script src="{{asset('js/charts/Chart.bundle.js')}}"></script>
    <script src="{{asset('js/charts/chartjs-plugin-colorschemes.js')}}"></script>
@endsection
    <div class="wrapper">
        <div class="upper-wrapper">
            <div class="circlechart">
                <div class="chart-container">
                <canvas id="myChart"></canvas>
                </div>
                <script src="{{asset('js/charts/charts.js')}}"></script>
            </div>
        </div>
        <div class="lower-wrapper mt-5">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">検索フォーム</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavDropdown">
                        <form class="d-flex">
                            <ul class="navbar-nav d-flex mx-auto">
                                <li class="nav-item ml-2 py-2">
                                    <select class="form-select" aria-label="Default select example" name="staff_id">
                                        <option hidden>選択してください</option>
                                        @foreach($staffs as $staff)
                                        <option value="{{$staff->id}}">{{$staff->name}}</option>
                                        @endforeach
                                    </select>
                                </li>
                                <li class="nav-item ml-2 py-2">
                                    <input type ="date" class="form-control date-form" name ="workday" value =""id="timeSelected1" data-from="から"required>
                                </li>
                                <li class="nav-item ml-2 py-2">
                                    <input type ="date" class="form-control" name ="workday" value =""id="timeSelected1"required>
                                </li>
                                <button class="btn btn-outline-success ml-2 py-2" type="submit">Search</button>
                            </ul>
                        </form>
                    </div>
                </div>
            </nav>
            <table class="table table-striped col-md-12">
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
                    <th scope="col">作業時間</th>
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
                    <td data-label="作業時間">#</td>
                    </tr>
                    @endforeach
                </tbody>
                @endif
            </table>
        </div>
    </div>
@endsection
