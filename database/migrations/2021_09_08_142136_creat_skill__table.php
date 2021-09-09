<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatSkillTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    // 'ID','Name' , 'important','ItemID','visiable'
    public function up()
    {
        Schema::create('skills', function (Blueprint $table) {
            $table->id("ID");
            $table->string("Name");
            $table->tinyinteger("important");
            $table->integer("ItemID");
            $table->boolean("visiable");
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
        Schema::dropIfExists('skills');
    }
}
