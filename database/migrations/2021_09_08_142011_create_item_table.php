<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    // 'Name' , 'rul' , 'contributes' , 'details' , 'start_time' , 'end_time', 'skills','CatID',
    // 'photo' , 'Likes','Views'
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string("Name");
            $table->string("rul");
            $table->string("contributes");
            $table->string("details");
            $table->date("start_time");
            $table->date("end_time");
            $table->string("skills");
            $table->integer("CatID");
            $table->string("photo");
            $table->smallInteger("Likes");
            $table->integer("Views");
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
        Schema::dropIfExists('items');
    }
}
