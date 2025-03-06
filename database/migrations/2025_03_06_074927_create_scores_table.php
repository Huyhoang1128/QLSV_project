<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('score', function (Blueprint $table) {
            $table->Increments('id');
            $table->unsignedInteger('StudentID');
            $table->unsignedInteger('SubjectID');
            $table->decimal('score', 4, 2)->check('score >= 0 AND score <= 10');
            $table->timestamps();

            $table->foreign('StudentID')
            ->references('id')->on('students')->onDelete('restrict');
            $table->foreign('SubjectID')
            ->references('id')->on('subjects')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('score');
    }
};
