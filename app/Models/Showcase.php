<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Showcase extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'cover',
        'no_team',
        'year',
        'description',
        'champion',
        'youtube_id',
    ];

    public function contributors() 
    {
        return $this->hasMany(Contributor::class, 'showcase_id');
    }
}
