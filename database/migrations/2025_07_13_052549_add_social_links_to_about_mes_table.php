<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('about_mes', function (Blueprint $table) {
            $table->string('linkedin_url')->nullable();
            $table->string('github_url')->nullable();
            $table->string('twitter_url')->nullable();
            $table->string('facebook_url')->nullable();
            $table->string('instagram_url')->nullable();
            $table->string('youtube_url')->nullable();
            // Add more as needed
        });
    }

    public function down(): void
    {
        Schema::table('about_mes', function (Blueprint $table) {
            $table->dropColumn([
                'linkedin_url',
                'github_url',
                'twitter_url',
                'facebook_url',
                'instagram_url',
                'youtube_url',
            ]);
        });
    }
};
