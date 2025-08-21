<?php

namespace App\Models;

use Carbon\Carbon;
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

    public function getIsAccessibleAttribute()
    {
        $now = Carbon::now();
        return Carbon::parse($this->open_at)->lte($now) &&
               Carbon::parse($this->end_at)->gte($now);
    }

    public function getIsNotStartedAttribute()
    {
        $now = Carbon::now();
        return $now->lt(Carbon::parse($this->open_at));
    }

    public function getIsExpiredAttribute()
    {
        $now = Carbon::now();
        return $now->gt(Carbon::parse($this->end_at));
    }
}
