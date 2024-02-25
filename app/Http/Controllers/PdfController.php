<?php

namespace App\Http\Controllers;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use App\Models\five_thousand_vocabulary;


class PdfController extends Controller
{
    public function download() {
        // Obtenha os dados da tabela ftv
        $ftvData = five_thousand_vocabulary::limit(100)->get();

        // Inicialize um array para armazenar os dados formatados
        $formattedData = [];

        // Loop pelos dados da tabela ftv
        foreach ($ftvData as $ftvItem) {
            // Divida a coluna 'use' em frases e traduções

            // Crie um array associativo com as chaves desejadas
            $formattedItem = [
                'word' => $ftvItem->word,
                'translate' => $ftvItem->translate,
                'use' => $ftvItem->use,
            ];

            // Adicione o item formatado ao array final
            $formattedData[] = $formattedItem;
        }

        // Carregue a visão PDF com os dados formatados
        $pdf = PDF::loadView('pdf', ['data' => $formattedData]);

        // Retorne o PDF para download
        return $pdf->stream();
        //return $pdf->download();
    }
}