<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nota');
            $table->unsignedBigInteger('id_student')->nullable();
            $table->unsignedBigInteger('id_course')->nullable();
            $table->unsignedBigInteger('id_teacher')->nullable();
            //LLAVES FORENEAS
            $table->foreign('id_student')
                                        ->references('id')->on('students')
                                        ->onDelete('set null');
            $table->foreign('id_course')
                                        ->references('id')->on('courses')
                                        ->onDelete('set null');
            $table->foreign('id_teacher')
                                        ->references('id')->on('teachers')
                                        ->onDelete('set null');
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
        Schema::dropIfExists('notes');
    }
}
