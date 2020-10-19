<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('crm_id')->unsigned();
            $table->integer('assigned_id')->unsigned();
            $table->enum('status', array('NEW','WIP','ANSWERED','CLOSED'))->default('NEW');
            $table->timestamps();
        });

        Schema::table('tickets', function(Blueprint $table) {
            $table->foreign('crm_id')->references('id')->on('crms');
            $table->foreign('assigned_id')->references('user_id')->on('escalations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tickets');
    }
}
