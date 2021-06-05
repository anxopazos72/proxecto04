<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComentariosTable extends Migration
{

    public function up()
    {
        Schema::create('comentarios', function (Blueprint $table) {
            $table->increments('id');
			$table->string('nombre');
            $table->string('email');
            $table->text('texto_comentario');
            $table->integer('post');
			$table->string('aprobado')->default($value = 'No');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('comentarios');
    }
}
