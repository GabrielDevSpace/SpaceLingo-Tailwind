<?php 

use Illuminate\Support\Facades\Auth;

if (!function_exists('user_id')){
    function user_id()
    {
        $user = Auth::user();
        return $user->id;
    }
}