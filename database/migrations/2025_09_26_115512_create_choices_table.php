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
        Schema::create('choices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('question_id')->nullable();
            $table->string('identifier')->nullable();
            $table->text('choice_text')->nullable();
            $table->boolean('is_correct')->nullable();
            $table->float('mapped_value')->nullable();
            $table->timestamps();
            
            // Foreign key constraint
            $table->foreign('question_id')->references('id')->on('questions')->onDelete('cascade');
            $table->index('question_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('choices');
    }
};
