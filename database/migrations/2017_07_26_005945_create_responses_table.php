<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResponsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('responses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('full_name');
            $table->string('email');
            $table->string('class');
            $table->string('1_A_1');
            $table->string('1_A_2');
            $table->string('1_B_1');
            $table->string('1_B_2');
            $table->string('1_C_1');
            $table->string('1_C_2');
            $table->string('1_D_1');
            $table->string('1_D_2');
            $table->string('2_A_1');
            $table->string('2_A_2');
            $table->string('2_B_1');
            $table->string('2_B_2');
            $table->string('2_C_1');
            $table->string('2_C_2');
            $table->string('2_D_1');
            $table->string('2_D_2');
            $table->string('3_A_1');
            $table->string('3_A_2');
            $table->string('3_B_1');
            $table->string('3_B_2');
            $table->string('3_C_1');
            $table->string('3_C_2');
            $table->string('3_D_1');
            $table->string('3_D_2');
            $table->string('4_A_1');
            $table->string('4_A_2');
            $table->string('4_B_1');
            $table->string('4_B_2');
            $table->string('4_C_1');
            $table->string('4_C_2');
            $table->string('4_D_1');
            $table->string('4_D_2');
            $table->string('5_A_1');
            $table->string('5_A_2');
            $table->string('5_B_1');
            $table->string('5_B_2');
            $table->string('5_C_1');
            $table->string('5_C_2');
            $table->string('5_D_1');
            $table->string('5_D_2');
            $table->string('6_A_1');
            $table->string('6_A_2');
            $table->string('6_B_1');
            $table->string('6_B_2');
            $table->string('6_C_1');
            $table->string('6_C_2');
            $table->string('6_D_1');
            $table->string('6_D_2');
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
        Schema::drop('responses');
    }
}
