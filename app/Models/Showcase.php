<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Showcase extends Model
{
    use Sluggable;

    protected $fillable = [
        'title',
        'slug',
        'cover',
        'description',
        'champion',
        'youtube_id',
        'team_id'
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title',
                'onUpdate' => true,
                'maxLength' => 255
            ]
        ];
    }

    public function team() 
    {
        return $this->belongsTo(Team::class, 'team_id');
    }

    public function getYoutubeEmbedUrlAttribute()
    {
        return $this->youtube_id ? "https://www.youtube.com/embed/{$this->youtube_id}" : null;
    }

    public function getYoutubeWatchUrlAttribute()
    {
        return $this->youtube_id ? "https://www.youtube.com/watch?v={$this->youtube_id}" : null;
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
