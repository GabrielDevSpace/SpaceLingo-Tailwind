<x-app-layout>

    <div class="max-w-6xl mx-auto py-2 sm:px-6 lg:px-8">
        <div class="flex flex-col ">
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8 ">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg p-3">
                    <div class="max-w-md mx-auto">
        <h1 class="text-2xl font-semibold mb-4">Cadastrar Vídeo</h1>

        @if (session('success'))
        <div class="bg-green-200 text-green-800 p-4 rounded mb-4">{{ session('success') }}</div>
        @endif

        <form action="{{ route('movie.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-4">
                <label for="movie_title" class="block font-medium mb-2">Título do Filme</label>
                <input type="text" name="movie_title" id="movie_title" class="w-full border-gray-300 rounded p-2" required>
            </div>

            <div class="mb-4">
                <label for="movie_file" class="block font-medium mb-2">Arquivo de Vídeo (MP4)</label>
                <input type="file" name="movie_file" id="movie_file" accept="video/mp4" required>
            </div>

            <div class="mb-4">
                <label for="subtitle_file" class="block font-medium mb-2">Arquivo de Legenda (SRT)</label>
                <input type="file" name="subtitle_file" id="subtitle_file" accept="text/srt" required>
            </div>

            <div class="mt-6">
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white rounded py-2 px-4">Cadastrar</button>
            </div>
        </form>
    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</x-app-layout>