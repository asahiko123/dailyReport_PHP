<?php

namespace App\Exports;

use App\Models\DailyReport;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;


class DailyReportExport implements FromCollection,WithHeadings
{

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return DailyReport::all();
    }

    public function headings():array{

        return [

            'スタッフ名',
            '作業区分',
            '進捗度',
            '案件名',
            '作業日時',
            '開始時刻',
            '終了時刻',
            '日報内容'
        ];
    }
}
