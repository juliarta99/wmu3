<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Showcase extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'cover',
        'description',
        'champion',
        'youtube_id',
        'team_id'
    ];


    public function team() 
    {
        return $this->belongsTo(Team::class, 'team_id');
    }
}
