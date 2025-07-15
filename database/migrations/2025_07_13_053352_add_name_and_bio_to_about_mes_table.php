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
        Schema::table('about_mes', function (Blueprint $table) {
            // Add these columns if they don't exist
            $table->string('name')->nullable(); // Make nullable if you don't want it required initially
            $table->text('bio')->nullable();   // Make nullable
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('about_mes', function (Blueprint $table) {
            $table->dropColumn(['name', 'bio']);
        });
    }
};
