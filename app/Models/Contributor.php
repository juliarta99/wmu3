<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contributor extends Model
{
    protected $fillable = [
        'name',
        'showcase_id',
    ];

    public function showcase() 
    {
        return $this->belongsTo(Showcase::class, 'showcase_id');
    }
}
