<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    // 'Name','description','skills','Posteremail','InValidUpTo' ,
    //  'minSalaryRange' , 'maxSalaryRange' , 'Salary' , 
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string("Name");
            $table->text("description");
            $table->string("skills");
            $table->string("Posteremail");
            $table->date("InValidUpTo");
            $table->float("minSalaryRange");
            $table->double("maxSalaryRange");
            $table->double("Salary");
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
        Schema::dropIfExists('jobs');
    }
}
