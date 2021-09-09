<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMemberSkillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    // 'SkillID' , 'MemberID' , 'Date','ID'
    public function up()
    {
        Schema::create('member_skills', function (Blueprint $table) {
            $table->id("ID");
            $table->integer("SkillID");
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
        Schema::dropIfExists('member_skills');
    }
}
