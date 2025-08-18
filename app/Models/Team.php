<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = [
        'no_team',
        'year',
    ];

    public function contributors() 
    {
        return $this->hasMany(Contributor::class, 'team_id', 'id');
    }

    public function showcases() 
    {
        return $this->hasMany(Showcase::class, 'team_id', 'id');
    }
}
