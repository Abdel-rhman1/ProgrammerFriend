<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLikeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    // 'ID' , 'ItemID' , 'MemberID' , 'Date',
    public function up()
    {
        Schema::create('likes', function (Blueprint $table) {
            $table->id("ID");
            $table->integer("ItemID");
            $table->integer("MemberID");
            $table->date("Date");
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
        Schema::dropIfExists('likes');
    }
}
