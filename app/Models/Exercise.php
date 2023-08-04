<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    protected $table = 'exercises';

    protected $fillable = [
        'topic',
        'description',
        'question',
        'alternatives',
        'answer',
        'translation', // Certifique-se de que o nome do campo esteja correto aqui
    ];
}
