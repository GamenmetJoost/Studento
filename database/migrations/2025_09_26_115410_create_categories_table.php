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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('sector')->nullable();
            $table->string('category')->nullable();
            $table->string('folder_guid')->nullable();
            $table->timestamps();
            
            // Add unique constraint for the combination
            $table->unique(['sector', 'category', 'folder_guid'], 'unique_category');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
}
};
