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
        Schema::create('student_subjects', function (Blueprint $table) {
            $table->softDeletes();
            $table->id();
            $table->unsignedInteger('Student_id');
            $table->unsignedInteger('Subject_id');
            $table->float('GPA')->default(-1);
            $table->text('Grade')->default("not announced");

            $table->timestamps();
            $table->foreign('Student_id')->nullable()->constrained('students');
            $table->foreign('Subject_id')->nullable()->constrained('subjects');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_subjects');
    }
};
