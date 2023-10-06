<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Newregister extends Model
{
    public function lang()
    {
        return $this->belongsTo(Lang::class);
    }

}
