<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('tender_id')->nullable();
            $table->longText('owners')->nullable();
//            $table->longText('user_id')->nullable();
            $table->string('text');
            $table->dateTime('start_date');
            $table->integer('duration');
            $table->string('type')->nullable();
            $table->float('progress');
            $table->integer('parent');
            $table->integer('sortorder')->default(0);
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
        Schema::dropIfExists('tasks');
    }
}
