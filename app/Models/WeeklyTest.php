<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeeklyTest extends Model
{
    protected $fillable = [
        'vocabularies', 
        'user_id', 
        'lang_id',
        'original',
        'translation',
        'translation_test',
        'status'
    ];

}
