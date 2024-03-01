<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FiveThousandVersionTwo extends Model
{
    protected $table = 'five_thousand_vocabulary_version_two';
    protected $fillable = ['word', 'translate', 'use_one','use_two','use_three','translate_one','translate_two','translate_three'];

    //public function updateFiveThousandVersiontwo($use_one, $use_two, $use_three, $translate_one, $translate_two, $translate_three,)
    public function updateFiveThousandVersiontwo($translate)
    {
        $this->translate = $translate;
        /*
        $this->use_two = $use_two;
        $this->use_three = $use_three;
        $this->translate_one = $translate_one;
        $this->translate_two = $translate_two;
        $this->translate_three = $translate_three;
        */
        $this->save();
    }
}
