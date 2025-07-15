<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutMes extends Model
{
    use HasFactory;

    protected $table = 'about_mes'; // Ensure table name is correct if it's not 'about_mes' by default

    protected $fillable = [
        'name',
        'bio',
        'profile_picture',
        'cv_path',
        'linkedin_url',   // Add these
        'github_url',     // Add these
        'twitter_url',    // Add these
        'facebook_url',   // Add these
        'instagram_url',  // Add these
        'youtube_url',    // Add these
        // ... other existing fillable fields
    ];

    // Accessor for profile picture URL (if you have one)
    public function getProfilePictureUrlAttribute()
    {
        return $this->profile_picture ? asset('storage/' . $this->profile_picture) : null;
    }

    // Accessor for CV URL
    public function getCvUrlAttribute()
    {
        return $this->cv_path ? asset('storage/' . $this->cv_path) : null;
    }
}
