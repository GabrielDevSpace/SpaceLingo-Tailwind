<?php 

use Illuminate\Support\Facades\Auth;

if (!function_exists('user_id')){
    function user_id()
    {
        $user = Auth::user();
        return $user->id;
    }
}

function getSvgHelper($resultLoop) {
    if ($resultLoop == 'vocabulary') {
        return '<svg class="h-8 w-8 text-gray-500" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
        <path stroke="none" d="M0 0h24v24H0z" />
        <line x1="4" y1="20" x2="7" y2="20" />
        <line x1="14" y1="20" x2="21" y2="20" />
        <line x1="6.9" y1="15" x2="13.8" y2="15" />
        <line x1="10.2" y1="6.3" x2="16" y2="20" />
        <polyline points="5 20 11 4 13 4 20 20" />
    </svg>';
    } elseif ($resultLoop == 'expression') {
        return '<svg class="h-8 w-8 text-gray-500" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
        <path stroke="none" d="M0 0h24v24H0z" />
        <path d="M3 20l1.3 -3.9a9 8 0 1 1 3.4 2.9l-4.7 1" />
        <line x1="12" y1="12" x2="12" y2="12.01" />
        <line x1="8" y1="12" x2="8" y2="12.01" />
        <line x1="16" y1="12" x2="16" y2="12.01" />
    </svg>';
    } else {
        return '<svg class="h-8 w-8 text-gray-500" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
        <path stroke="none" d="M0 0h24v24H0z" />
        <path d="M3 12h7l-3 -3m0 6l3 -3" />
        <path d="M21 12h-7l3 -3m0 6l-3 -3" />
        <path d="M9 6v-3h6v3" />
        <path d="M9 18v3h6v-3" />
    </svg>';
    }
}