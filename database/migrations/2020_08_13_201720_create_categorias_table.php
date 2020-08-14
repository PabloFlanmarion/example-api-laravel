<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categorias', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("nome",20)->nullable();
            $table->string("descricao",74)->nullable();
            $table->string("campo1",10);
            $table->string("campo2",10);
            $table->string("campo3",10);
            $table->string("campo4",10);
            $table->string("campo5",10);
            $table->string("campo6",10);
            $table->string("campo7",10);
            $table->string("campo8",10);
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
        Schema::dropIfExists('categorias');
    }
}
