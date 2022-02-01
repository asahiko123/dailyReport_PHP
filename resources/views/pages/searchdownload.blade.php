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
    @if(isset($searchlists))
    <tbody>
        @foreach($searchlists as $searchlist)
        <tr>
        <th scope="row"></th>
        <td data-label="スタッフ名">{{$searchlist->Staff->name}}</td>
        <td data-label="作業区分">{{$searchlist->WorkDiv->WorkType->work_type}}</td>
        <td data-label="進捗度">{{$searchlist->Progress->persent}}</td>
        <td data-label="案件名">{{$searchlist->Supplier->supplier}}_{{$searchlist->Supplier->project}}</td>
        <td data-label="作業日時">{{$searchlist->workday}}</td>
        <td data-label="開始時刻">{{$searchlist->startTime}}</td>
        <td data-label="終了時刻">{{$searchlist->endTime}}</td>
        <td data-label="日報内容">{{$searchlist->comment}}</td>
        </tr>
        @endforeach
    </tbody>
    @endif
</table>
