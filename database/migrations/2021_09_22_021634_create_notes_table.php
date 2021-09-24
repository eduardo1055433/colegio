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
            $table->unsignedBigInteger('id_user')->nullable();
            $table->unsignedBigInteger('id_course')->nullable();
            //LLAVES FORENEAS
            $table->foreign('id_user')
                                        ->references('id')->on('users')
                                        ->onDelete('set null');
            $table->foreign('id_course')
                                        ->references('id')->on('courses')
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
