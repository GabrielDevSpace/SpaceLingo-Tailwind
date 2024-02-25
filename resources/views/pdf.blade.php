<!doctype html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/pdf.css') }}" type="text/css"> 
    <title>Invoice</title>
</head>
<body>
    <table class="w-full">
        <tr>
            <td class="w-half">
                <img src="{{ asset('images/logospacelingo300.png') }}" alt="laravel daily" width="200" />
            </td>
            <td class="w-half">
                <h2>Invoice ID: 834847473</h2>
            </td>
        </tr>
    </table>

    <div class="margin-top">
        <table class="products">
            <tr>
                <th>Word</th>
                <th>Translate</th>
                <th>Uso</th>
            </tr>
            @foreach($data as $item)
            <tr class="items">
                    <td>
                        {{ $item['word'] }}
                    </td>
                    <td>
                        {{ $item['translate'] }}
                    </td>
                    <td>
                        {{ $item['use'] }}
                    </td>
            </tr>
            @endforeach
        </table>
    </div>

    <div class="footer margin-top">
        <div>Thank you</div>
        <div>&copy; Laravel Daily</div>
    </div>
</body>
</html>