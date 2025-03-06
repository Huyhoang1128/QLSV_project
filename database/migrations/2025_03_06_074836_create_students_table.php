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
        Schema::create('students', function (Blueprint $table) {
            $table->Increments('id');
            $table->unsignedInteger('ClassID'); //khoa ngoai
            $table->string('StudentName',255);
            $table->date('birthday');
            $table->timestamps();

            $table->foreign('ClassID')
            ->references('id')->on('classes')->onDelete('restrict');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
