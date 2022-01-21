<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDailyReportTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daily_report', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('stuff_id')->nullable(false)->comment('スタッフ名');
            $table->integer('work_id')->nullable(false)->comment('作業内容');
            $table->integer('progress')->nullable(false)->comment('進捗度');
            $table->string('created')->nullable(false)->comment('作業日時');
            $table->string('startTime')->nullable(false)->comment('開始時刻');
            $table->string('endTime')->nullable(false)->comment('終了時刻');
            $table->text('comment')->nullable(false)->comment('日報内容');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('daily_report');
    }
}
