<!-- update.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Atualizar registros</title>
</head>
<body>
    <h1>Atualizar registros</h1>

    @if(session('message'))
        <div>
            {{ session('message') }}
        </div>
    @endif

    <form action="{{ route('five-thousand.update') }}" method="POST">
        @csrf
        <textarea name="json" rows="10" cols="50"></textarea>
        <br>
        <button type="submit">Atualizar</button>
    </form>
<textarea  rows="15" cols="100">
Qual o significado da palavra em ingles "got", quando podemos utiliza-la, quais suas variações, e como soa no português? formate a resposta no formato array onde esteja no sequinte padrao:

[
    {
        "word": "palavra pesquisada",
        "translate": ["todas as traduções da palavra"],
        "use": [
            "O maximo de exemplos de uso iniciando com exemplo em ingles e depois traduzindo os exemplos" ],
        "variation": [
            " as variações possiveis, presente, futuro, passado, etc." ],
        "pronunciation": [
            "como se pronuncia no portugues, qual o som dessa palavra"
        ]
    }
]
</textarea>
    <div>
    <h1>Palavras Cadastradas</h1>

<ul>
    @foreach ($words as $word)
        <li>{{ $word->word }}</li>
    @endforeach
</ul>
    </div>
</body>
</html>
