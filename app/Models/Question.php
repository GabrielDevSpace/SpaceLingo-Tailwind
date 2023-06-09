<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table = 'questions';

    protected $fillable = [
        'word',
        'question1',
        'question2',
        'question3',
    ];

    // Relação com a tabela "answers"
    public function answers()
    {
        return $this->hasMany(Answer::class, 'id_questions');
    }
}
