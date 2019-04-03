<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateInstitutionsCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('institutionsCourses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('instituicao_id')->unsigned();
            $table->bigInteger('curso_id')->unsigned();
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
        Schema::table('institutionsCourses', function (Blueprint $table){
            $table->foreign('instituicao_id')->references('id')->on('institutions')->onDelete('cascade');
            $table->foreign('curso_id')->references('id')->on('courses')->onDelete('cascade');
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('institutionsCourses');
    }
}
