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
        Schema::create('work', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('work_type_id')->unsigned()->nullable(false)->comment('作業内容');
            $table->string('identification')->nullable()->comment('作業識別番号');
            $table->text('comment')->nullable()->comment('備考');
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('work_type_id')
                  ->references('id')
                  ->on('work_type')
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
        Schema::dropIfExists('work_div');
    }
}
