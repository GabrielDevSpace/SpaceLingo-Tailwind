<?php

namespace App\Helpers;

use App\Models\Lang;

class LanguageImageHelper
{
    public static function getLanguageName($lang_id)
    {
        // Consultar o banco de dados para obter o nome da linguagem
        $language = Lang::find($lang_id);

        return $language ? $language->name : ''; // Retorna o nome da linguagem ou uma string vazia se não for encontrado.
    }

    public static function getLanguageImage($lang_id)
    {
        $languageName = self::getLanguageName($lang_id);

        $languageImages = [
            'English' => 'usa.png',
            'Spanish' => 'spain.png',
            'French' => 'france.png',
            'German' => 'germany.png',
            'Japanese' => 'japan.png',
            'Italian' => 'italy.png',
            'korean' => 'korea.png',
            'Portuguese-Brazil' => 'brazil.png',
            'Portuguese-Portugal' => 'portugal.png',
            'Chinese' => 'china.png',
            'Hindi' => 'india.png',
            'Russian' => 'russia.png',
  
        ];

        return $languageImages[$languageName] ?? ''; // Retorna o nome da imagem ou uma string vazia se não houver correspondência.
    }
}
