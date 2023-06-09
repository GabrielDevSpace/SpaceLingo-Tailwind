<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $table = 'answers';

    protected $fillable = [
        'id_questions',
        'answer1',
        'answer2',
        'answer3',
    ];

    // Relação com a tabela "questions"
    public function question()
    {
        return $this->belongsTo(Question::class, 'id_questions');
    }
}
