<?php

namespace App\Models;

use App\Models\Team;
use Illuminate\Database\Eloquent\Model;

class Contributor extends Model
{
    protected $fillable = [
        'name',
        'team_id',
    ];

    public function team() 
    {
        return $this->belongsTo(Team::class, 'team_id');
    }
}
