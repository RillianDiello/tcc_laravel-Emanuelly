<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateCoursesTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coursesTeachers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('professor_id')->unsigned();
            $table->bigInteger('curso_id')->unsigned();
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
        Schema::table('coursesTeachers', function (Blueprint $table){
            $table->foreign('professor_id')->references('id')->on('teachers')->onDelete('cascade');;
            $table->foreign('curso_id')->references('id')->on('courses')->onDelete('cascade');;
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('coursesTeachers');
    }
}
