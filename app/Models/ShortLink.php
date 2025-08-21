<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShortLink extends Model
{
    protected $fillable = [
        'name',
        'link',
        'back_half',
        'open_at',
        'end_at',
        'count_visitors',
        'created_by'
    ];

    public function created_by() 
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function getRouteKeyName()
    {
        return 'back_half';
    }
}
