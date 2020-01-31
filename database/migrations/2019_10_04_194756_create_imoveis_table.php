<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImoveisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imoveis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('tipo_id')->unsigned();/*só numeros positivos*/
            $table->foreign('tipo_id')->references('id')
                ->on('tipos');
            $table->integer('cidade_id')->unsigned();/*só numeros positivos*/
            $table->foreign('cidade_id')->references('id')
                ->on('cidades');

            $table->string('titulo');
            $table->string('descricao');
            $table->string('imagem');
            $table->enum('status',['vende','aluga']);
            $table->string('endereco');
            $table->string('cep');
            $table->decimal('valor',6,2);/*seis digitos antes da virgula e duas casas decimais*/
            $table->integer('dormitorios');
            $table->string('detalhes');
            $table->text('mapa')->nullable();
            $table->bigInteger('visualizacoes')->default(0);
            $table->enum('publicar',['sim','nao'])->default('nao');
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
        Schema::dropIfExists('imoveis');
    }
}
