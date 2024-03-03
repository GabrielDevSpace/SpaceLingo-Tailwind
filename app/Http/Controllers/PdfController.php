<?php

namespace App\Http\Controllers;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use App\Models\FiveThousandVersionTwo;


class PdfController extends Controller
{
    public function download() {
        // Obtenha os dados da tabela ftv
        $ftvData = FiveThousandVersionTwo::OrderBy('word')
        ->limit(100)->get();

        // Inicialize um array para armazenar os dados formatados
        $formattedData = [];

        // Loop pelos dados da tabela ftv
        foreach ($ftvData as $ftvItem) {
            // Divida a coluna 'use' em frases e traduções

            // Crie um array associativo com as chaves desejadas
            $formattedItem = [
                'word' => $ftvItem->word,
                'translate' => $ftvItem->translate,
                'use_one' => $ftvItem->use_one,
                'use_two' => $ftvItem->use_two,
                'use_three' => $ftvItem->use_three,
                'translate_one' => $ftvItem->translate_one,
                'translate_two' => $ftvItem->translate_two,
                'translate_three' => $ftvItem->translate_three,
            ];

            // Adicione o item formatado ao array final
            $formattedData[] = $formattedItem;
        }
        set_time_limit(300);
        // Carregue a visão PDF com os dados formatados
        $pdf = PDF::loadView('pdf', ['data' => $formattedData]);

        // Retorne o PDF para download
        return $pdf->stream();
        //return $pdf->download();
    }
}