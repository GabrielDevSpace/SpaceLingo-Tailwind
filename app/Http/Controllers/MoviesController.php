<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use Illuminate\Support\Facades\Storage;


class MoviesController extends Controller
{
    public function index()
    {
        return view('movies.movies');
    }


    public function create()
    {
        return view('movies.create');
    }


public function store(Request $request)
{
    $validatedData = $request->validate([
        'movie_title' => 'required',
        'movie_file' => 'required|mimetypes:video/mp4',
        'subtitle_file' => 'required|mimetypes:text/srt',
    ]);

    // Salvar o vídeo
    $movieFile = $request->file('movie_file');
    $moviePath = $movieFile->store('movies', 'public');

    // Salvar a legenda
    $subtitleFile = $request->file('subtitle_file');
    $subtitlePath = $subtitleFile->store('subtitles', 'public');

    // Salvar os caminhos no banco de dados
    $movie = Movie::create([
        'title' => $request->input('movie_title'),
        'movie_path' => $moviePath,
        'subtitle_path' => $subtitlePath,
    ]);


    return redirect()->back()->with('success', 'Vídeo cadastrado com sucesso!');
}
}