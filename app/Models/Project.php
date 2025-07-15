<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'short_description', // Match migration
        'long_description',  // Match migration
        'technologies',
        'live_url',
        'github_url',
        'featured_image',    // Match migration
        'screenshots',       // Match migration
        'is_featured',
        'order',
    ];

    protected $casts = [
        'technologies' => 'array',
        'screenshots' => 'array', // Cast screenshots to an array
        'is_featured' => 'boolean',
    ];

    // Mutator to automatically generate slug from title
    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    /**
     * Get the route key for the model.
     * This tells Laravel to use the 'slug' column for route model binding.
     */
    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    // Accessor for featured image URL
    public function getFeaturedImageUrlAttribute()
    {
        return $this->featured_image ? asset('storage/' . $this->featured_image) : null;
    }

    // Accessor for screenshots URLs (if you want to process them)
    public function getScreenshotUrlsAttribute()
    {
        if (!empty($this->screenshots)) {
            return collect($this->screenshots)->map(function ($screenshot) {
                return asset('storage/' . $screenshot);
            })->toArray();
        }
        return [];
    }
}
