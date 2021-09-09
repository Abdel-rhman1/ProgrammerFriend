<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatSavedJobTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    // 'user_id' , 'job_id',
    public function up()
    {
        Schema::create("savedJobs" , function(Blueprint $table){
            $table->id();
            $table->integer("user_id");
            $table->integer("job_id");
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
        Schema::dropIfExists('savedJobs');
    }
}
