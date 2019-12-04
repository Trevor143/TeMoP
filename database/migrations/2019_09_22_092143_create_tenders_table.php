<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateTendersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tenders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('name');
            $table->longText('brief');
            $table->dateTime('deadline');
            $table->integer('applicationFee')->nullable();
            $table->enum('status', ['DRAFT', 'PUBLISHED', 'AWARDED'])->default(0);
            $table->string('filename')->nullable();
            $table->longText('requiredDocs');
            $table->boolean('closed');
            $table->text('reason');
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
        Schema::dropIfExists('tenders');
    }
}
