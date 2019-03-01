<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fees', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('student_id');
	    $table->unsignedInteger('amount');
	    $table->date('date');
	    $table->boolean('cash');// 1 - cash , 0 - cheque
	    $table->text('period');// 'January' , 'September', 'April-June' 
	    $table->text('comments');// 'chq no 29927' 
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
        Schema::dropIfExists('fees');
    }
}
