<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOfertasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ofertas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('local_id')->unsigned();
            $table->integer('tag_id')->unsigned();
            $table->string('nombre_oferta', 200);
            $table->integer('precio');
            $table->date('fecha_inicio');
            $table->time('fecha_termino');
            $table->date('hora_termino');
            $table->string('descripcion', 500);

            $table->foreign('tag_id')->references('id')->on('tags')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('local_id')->references('id')->on('Locales')
                ->onUpdate('cascade')->onDelete('cascade');

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
        //
    }
}
