<?php

namespace App\Http\Controllers;

use App\Models\five_thousand_vocabulary;
use Illuminate\Http\Request;

class JsonController extends Controller
{
    public function showAllWords()
    {
    $words = five_thousand_vocabulary::all();

    return view('update')->with('words', $words);
    }

    public function updateFromJson(Request $request)
    {
        $json = $request->input('json');
        $data = json_decode($json, true);
    
        if (is_array($data)) {
            foreach ($data as $item) {
                $word = $item['word'];
                $translate = $item['translate'];
                $use = $item['use'];
                $variation = $item['variation'];
                $pronunciation = $item['pronunciation'];
    
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
