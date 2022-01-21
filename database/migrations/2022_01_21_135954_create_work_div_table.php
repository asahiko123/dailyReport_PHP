<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkDivTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_div', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('work_type_id')->nullable(false)->comment('作業内容');
            $table->integer('work_div_id')->nullable(false)->comment('作業内容ID');
            $table->text('comment')->nullable()->comment('備考');
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
        Schema::dropIfExists('work_div');
    }
}
