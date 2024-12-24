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
            $table->id();
            $table->string('name'); 
            $table->date('dob'); 
            $table->enum('gender', ['male', 'female', 'other']); 
            $table->unsignedBigInteger('course_id'); 
            $table->string('guardian_name'); 
            $table->string('contact_info'); 
            $table->text('address'); 
            $table->date('enrollment_date'); 
            $table->timestamps(); 
            // Foreign key constraint
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
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
