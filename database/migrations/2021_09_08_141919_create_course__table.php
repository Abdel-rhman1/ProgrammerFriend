<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // 'ID' , 'Name' , 'photo' , 'InstructorID','details', 'Date' , 'Price' , 'taken',
        Schema::create('courses', function (Blueprint $table) {
            $table->id("ID");
            $table->string("Name");
            $table->string("photo");
            $table->integer("InstructorID");
            $table->text("details");
            $table->date("Date");
            $table->float("Price");
            $table->string("taken");
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
        Schema::dropIfExists('courses');
    }
}
