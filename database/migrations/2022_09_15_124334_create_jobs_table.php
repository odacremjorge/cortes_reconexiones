<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('amount_job');
            $table->date('date_job');
            $table->integer('c');
            $table->integer('cnp');
            $table->integer('cc');
            $table->integer('md');
            $table->integer('mbll');
            $table->integer('imp');
            $table->integer('ie');
            $table->bigInteger('operator_id')->unsigned();
            $table->foreign('operator_id')->references('id')->on('operators')->onDelete('cascade');
            $table->bigInteger('remesa_id')->unsigned();
            $table->foreign('remesa_id')->references('id')->on('remesas')->onDelete('cascade');
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
        Schema::dropIfExists('jobs');
    }
};
