<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEscalationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('escalations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('query_type_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->integer('mail_to')->unsigned();
            $table->string('mail_cc')->nullable();
            $table->timestamps();

            $table->foreign('query_type_id')->references('id')->on('query_types');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('mail_to')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('escalations');
    }
}
