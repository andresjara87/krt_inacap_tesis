<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSimilitudesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('similitudes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('userX_id')->unsigned();
            $table->integer('userY_id')->unsigned();
            $table->integer('nota')->nullable();

            $table->foreign('userX_id')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('userY_id')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');

        });
        //
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
