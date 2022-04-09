<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('results', function (Blueprint $table) {
            $table->id();
            $table->string('course_name');
            $table->string('course_code');
            $table->string('semester');
            $table->string('session');
            $table->string('student_name');
            $table->string('matric_number');
            $table->string('CA');
            $table->string('Exam_score');
            $table->string('grade');
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
        Schema::dropIfExists('results');
    }
};
