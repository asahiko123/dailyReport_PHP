<table>
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
        <th scope="col">日報内容</th>
        </tr>
    </thead>
    @if(isset($dailyReports))
    <tbody>
        @foreach($dailyReports as $dailyReport)
        <tr>
        <th scope="row"></th>
        <td data-label="スタッフ名">{{$dailyReport->Staff->name}}</td>
        <td data-label="作業区分">{{$dailyReport->WorkDiv->WorkType->work_type}}</td>
        <td data-label="進捗度">{{$dailyReport->Progress->persent}}</td>
        <td data-label="案件名">{{$dailyReport->Supplier->supplier}}_{{$dailyReport->Supplier->project}}</td>
        <td data-label="作業日時">{{$dailyReport->workday}}</td>
        <td data-label="開始時刻">{{$dailyReport->startTime}}</td>
        <td data-label="終了時刻">{{$dailyReport->endTime}}</td>
        <td data-label="日報内容">{{$dailyReport->comment}}</td>
        </tr>
        @endforeach
    </tbody>
    @endif
</table>
