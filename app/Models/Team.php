<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = [
        'name',
        'year',
    ];

    public function contributors() 
    {
        return $this->hasMany(Contributor::class, 'team_id', 'id');
    }

    public function showcase() 
    {
        return $this->hasOne(Showcase::class, 'team_id', 'id');
    }
}
