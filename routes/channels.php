<?php

use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('laporan-channel', function ($user = null) {
    // Bisa batasi ke admin: return $user && $user->is_admin;
    return true; // untuk demo
});
