<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Newregister extends Model
{
    use HasFactory;

    protected $fillable = ['vocabulary','translate','note','user_id','type'];

}
