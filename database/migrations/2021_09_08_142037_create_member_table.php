<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMemberTable extends Migration
{
    // 'id' , 'Name' , 'email' , 'password', 'role' , 'about_You','photo', 'cv' , 
    // 'remember_token'
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string("Name" , 100);
            $table->string("email" , 100);
            $table->string("password" , 100);
            $table->smallInteger("role");
            $table->text("about_You");
            $table->string("photo" , 100);
            $table->string("cv" , 100);
            $table->string("remember_token");
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
        Schema::dropIfExists('members');
    }
}
