<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Newregister extends Model
{

    protected $fillable = [
        'vocabulary', 
        'user_id', 
        'translate',
        'type',
        'note',
        'lang_id'
    ];
    public function lang()
    {
        return $this->belongsTo(Lang::class);
    }

}
