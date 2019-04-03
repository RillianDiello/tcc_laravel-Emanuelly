<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateWorksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('works', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('titulo');
            $table->string('tema');
            $table->string('palavras_chaves');
            $table->text('resumo');
            $table->timestamp('data_apresentacao');
            $table->bigInteger('instituicao_id')->unsigned();
            $table->bigInteger('curso_id')->unsigned();
            $table->bigInteger('professor_id')->unsigned();
            $table->bigInteger('aluno1_id')->unsigned();
            $table->bigInteger('aluno2_id')->unsigned();
            $table->bigInteger('tipo_trabalho_id')->unsigned();
            $table->bigInteger('arquivo_id')->unsigned();
            $table->engine = 'InnoDB';
        });
        Schema::table('works', function (Blueprint $table){
            $table->foreign('instituicao_id')->references('id')->on('institutions')->onDelete('cascade');
            $table->foreign('curso_id')->references('id')->on('courses')->onDelete('cascade');
            $table->foreign('professor_id')->references('id')->on('teachers')->onDelete('cascade');
            $table->foreign('aluno1_id')->references('id')->on('students')->onDelete('cascade');
            $table->foreign('aluno2_id')->references('id')->on('students')->onDelete('cascade');
            $table->foreign('tipo_trabalho_id')->references('id')->on('typesWorks')->onDelete('cascade');
            $table->foreign('arquivo_id')->references('id')->on('files')->onDelete('cascade');
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('works');
    }
}
