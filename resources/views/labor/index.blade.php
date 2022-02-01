@extends('layouts.dashboard')
@section('content')

    @section('scripts')
        @parent
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="{{asset('js/charts/Chart.bundle.js')}}"></script>
        <script src="{{asset('js/colorschemes/chartjs-plugin-colorschemes.js')}}"></script>
        <script style="display: none">
        const searchlists = JSON.parse('<?php echo $search_json ?? ''; ?>');
        const diffAll = JSON.parse('<?php echo $diffAll_json ?? ''; ?>');
        const searchAll = JSON.parse('<?php echo $searchAll_json ?? ''; ?>');
        const diffs = JSON.parse('<?php echo $diff_json ?? ''; ?>');
        </script>

    @endsection

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">労務管理マスタ</h1>
        <!-- <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
            @if(isset($searchlists))
            <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='{{route('pages.searchdownload')}}'"id="download">
            <span data-feather="file"></span>
            Excel
            </button>
            <script src="{{asset('js/ajax.js')}}"></script>
            @endif
            </div>
            <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
            <span data-feather="calendar"></span>
            This week
            </button>
        </div> -->
    </div>
    <div class="wrapper">
        <div class="upper-wrapper container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="tabs clearfix">
                        <a href="#" class="cell active">個人データ</a>
                        <a href="#" class="cell">全体比較</a>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card graphs" id="circle">
                        <div class="circlechart">
                            <div class="chart-container">
                            <canvas id="myChart"></canvas>
                            </div>
                            <script src="{{asset('js/charts/charts.js')}}"></script>
                        </div>
                    </div>
                    <div class="card graphs" id= "stacked" style="display:none">
                        <div class="circlechart">
                            <div class="chart-container">
                            <canvas id="myChart-stacked"></canvas>
                            </div>
                            <script src="{{asset('js/charts/charts-stacked.js')}}"></script>
                        </div>
                    </div>
                </div>
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
                        <form method = "POST" action="{{route('labor.search')}}"class="d-flex">
                            @csrf
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
                                    <input type ="date" class="form-control date-form" name ="dayfrom"required>
                                </li>
                                <li class="nav-item ml-2 py-2"style="color:white">
                                    から
                                </li>
                                <li class="nav-item ml-2 py-2">
                                    <input type ="date" class="form-control date-form" name ="dayto"required>
                                </li>
                                <button class="btn btn-outline-success ml-2 py-2" type="submit">検索する</button>
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
                @if(isset($searchlists))
                <tbody>
                    @foreach($searchlists as $searchlist)
                    <tr>
                    <th scope="col"></th>
                    <td data-label="スタッフ名">{{$searchlist->Staff->name}}</td>
                    <td data-label="作業区分">{{$searchlist->WorkDiv->WorkType->work_type}}</td>
                    <td data-label="進捗度">{{$searchlist->Progress->persent}}</td>
                    <td data-label="案件名">{{$searchlist->Supplier->supplier}}_{{$searchlist->Supplier->project}}</td>
                    <td data-label="作業日時">{{$searchlist->workday}}</td>
                    <td data-label="開始時刻">{{$searchlist->startTime}}</td>
                    <td data-label="終了時刻">{{$searchlist->endTime}}</td>
                    <td data-label="作業時間">{{(\Carbon\Carbon::parse($searchlist->startTime))->diffInMinutes(\Carbon\Carbon::parse($searchlist->endTime))}}分</td>
                    </tr>
                    @endforeach
                </tbody>
                @else
                <p>検索結果にあてはまるデータがありません</p>
                @endif
            </table>
        </div>
    </div>

@endsection
