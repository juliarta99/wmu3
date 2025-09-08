<?php

use Illuminate\Support\Facades\Broadcast;

// Broadcast::channel('home-admin', function ($user) {
//     return $user->role === true;
// });

Broadcast::channel('home-admin', function ($user) {
    return true;
});
