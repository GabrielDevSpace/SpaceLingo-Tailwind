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
</body>
</html>
