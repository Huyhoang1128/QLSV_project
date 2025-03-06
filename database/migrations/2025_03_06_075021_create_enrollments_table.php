<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('enrollments', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('StudentID');
            $table->unsignedInteger('SubjectID');
            $table->timestamps();

            $table->foreign('StudentID')
            ->references('id')->on('students')->onDelete('restrict');
            $table->foreign('SubjectID')
            ->references('id')->on('subjects')->onDelete('restrict');
        });
    }

    public function down()
    {
        Schema::dropIfExists('enrollments');
    }
};
