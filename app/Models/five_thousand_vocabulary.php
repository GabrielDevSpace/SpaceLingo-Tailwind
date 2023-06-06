<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class five_thousand_vocabulary extends Model
{
    protected $table = 'five_thousand_vocabulary';
    protected $fillable = ['word', 'translate', 'use','variation','pronunciation'];

    public function updateFiveThousand($translate, $use, $variation, $pronunciation)
    {
        $this->translate = $translate;
        $this->use = $use;
        $this->variation = $variation;
        $this->pronunciation = $pronunciation;
        $this->save();
    }
}
