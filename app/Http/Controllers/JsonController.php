<?php

namespace App\Http\Controllers;

use App\Models\five_thousand_vocabulary;
use Illuminate\Http\Request;

class JsonController extends Controller
{
    public function showAllWords()
    {
    $words = five_thousand_vocabulary::where('variation', '0')
    ->get();

    $complete = five_thousand_vocabulary::whereNot('variation', '0')
    ->get();

    return view('update')->with([
        'words' => $words,
        'complete' => $complete
    ]);
    }

    public function updateFromJson(Request $request)
{
    $json = $request->input('json');
    $data = json_decode($json, true);

    if (is_array($data)) {
        foreach ($data as $item) {
            $word = $item['word'];
            $translate = implode(', ', $item['translate']);
            $use =  implode(', ', $item['use']);
            $variation =  implode(', ', $item['variation']);
            $pronunciation =  implode(', ', $item['pronunciation']);

            $record = five_thousand_vocabulary::where('word', $word)->first();

            if ($record) {
                $record->updateFiveThousand($translate, $use, $variation, $pronunciation);
            }
        }

        return redirect()->back()->with('message', 'Atualização concluída com sucesso');
    }

    return redirect()->back()->with('message', 'Erro: JSON inválido');
}

    
}
