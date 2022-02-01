<?php

namespace App\Exports;

use App\Models\DailyReport;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithHeadings;


class DailyReportExport implements FromView,WithHeadings
{

    private $view;

    public function __construct(View $view){

        $this->view = $view;
    }

    /**
     * @return View
    */

    public function view():View{

        return $this->view;
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
