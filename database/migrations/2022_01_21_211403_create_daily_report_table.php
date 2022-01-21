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
            $table->bigInteger('staff_id')->unsigned()->nullable(false)->comment('スタッフ名');
            $table->bigInteger('supplier_id')->unsigned()->nullable()->comment('取引先案件名');
            $table->bigInteger('work_id')->unsigned()->nullable(false)->comment('作業内容');
            $table->bigInteger('progress_id')->unsigned()->nullable(false)->comment('進捗度');
            $table->string('workday')->nullable(false)->comment('作業日時');
            $table->string('startTime')->nullable(false)->comment('開始時刻');
            $table->string('endTime')->nullable(false)->comment('終了時刻');
            $table->text('comment')->nullable(false)->comment('日報内容');
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('staff_id')
                  ->references('id')
                  ->on('staff')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');

            $table->foreign('supplier_id')
                  ->references('id')
                  ->on('supplier')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');

            $table->foreign('progress_id')
                  ->references('id')
                  ->on('progress')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');

            $table->foreign('work_id')
            ->references('id')
            ->on('work')
            ->onDelete('cascade')
            ->onUpdate('cascade');
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
