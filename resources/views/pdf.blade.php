<!doctype html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SpaceLingo - Inglês</title>
    <style>

        div {
            max-width: 1200px;
            margin: 10px auto;
            background-color: #fff;
            padding: 10px;

        }

        h1, h2 {
            text-align: center;
            color: #674ea7;
        }

        ul {
            list-style-type: solid;
            padding-left: 20px;
            padding-bottom: 10px;
            color: #674ea7;
            font-weight: bold;
            font-size: 15px;
        }

        li {
            margin-bottom: 10px;
        }

        p, strong {
            color: #3c3c3c;
            margin-bottom: 5px;
        }
    </style>
    <style>
        @font-face {
            font-family: "source_sans_proregular";
            src: local("Source Sans Pro"), url("fonts/sourcesans/sourcesanspro-regular-webfont.ttf") format("truetype");
            font-weight: normal;
            font-style: normal;
        }

        body {
            font-family: "source_sans_proregular", Calibri, Candara, Segoe, Segoe UI, Optima, Arial, sans-serif;
        }

        h4 {
            margin: 0;
        }

        .w-full {
            width: 100%;
        }

        .w-half {
            width: 50%;
        }

        .margin-top {
            margin-top: 1.25rem;
        }

        .footer {
            font-size: 0.875rem;
            padding: 1rem;
            background-color: rgb(241 245 249);
        }

        table {
            width: 100%;
            border-spacing: 0;
        }

        table.products {
            font-size: 0.875rem;
        }

        table.products tr {
            background-color: #674ea7;
        }

        .tr_violet {
            background-color: #674ea7;
            padding-top: 1px;
        }

        table.products th {
            color: #ffffff;
            padding: 0.5rem;
        }

        table tr.items {
            background-color: white;
            font-size: 12px;
        }

        table tr.items_head {
            background-color: #b4a7d6;
        }

        table .word {
            text-align: left;
            padding: 4px 10px;
        }

        table tr.items td {
            padding: 0.5rem;
        }

        .word_style {
            font-size: 13px;
            text-transform: capitalize;
            text-align: left;
            padding: 1px;
        }


        .tr_word {
            text-align: left;
        }

        .translate_style {
            font-size: 10px;
            text-transform: capitalize;
        }
    </style>
</head>

<body>
<div>
        <h1>SpaceLingo</h1>
        <h2>+ de 5 Mil Palavras Mais Usadas em <i>(Inglês)</i> </h2>
        
        <p>Se está em busca de um completo domínio da língua inglesa, o <strong>SpaceLingo</strong> é a solução ideal para você!</p>
        <ul>
            <li>Desvende palavras essenciais</li>
            <li>Mestre das regras de gramática moderna</li>
            <li>Domine o uso preciso dos numerais</li>
            <li>Explore expressões-chave e seus contextos</li>
            <li>Pratique frases para situações cotidianas</li>
        </ul>
        <p>Esteja preparado para imergir em uma jornada educacional envolvente que ultrapassa as fronteiras do aprendizado convencional.</p>
        <h2>O que torna SpaceLingo tão Incrível?</h2>
        <p><strong>Exploração Abrangente:</strong> Com <strong>SpaceLingo</strong>, você não estará apenas enriquecendo em volcabulário; estará imerso em uma exploração abrangente, repleta de exemplos práticos para uma aplicação imediata.</p>
        <p><strong>Diferenciais Inigualáveis:</strong> Equipado com as principais regras de gramática, expressões-chave e um guia completo sobre o uso dos numerais, <strong>SpaceLingo</strong> oferece uma compreensão completa e prática do inglês moderno.</p>
        <p><strong>Profissional e Situacional:</strong> Vá além do comum. <strong>SpaceLingo</strong> apresenta uma lista de frases para diversas situações, proporcionando destaque tanto no âmbito pessoal quanto profissional.</p>
        <p>Elaborado para aqueles que aspiram ao conhecimento, o SpaceLingo é a ponte que conduz iniciantes à expertise profissional e transforma profissionais em mestres da língua inglesa.</p>
    </div>

    <div class="margin-top">
        @foreach($data as $item)
        <table class="products">
            <tr>
                <th class="tr_word"><b class="word_style">{{ $item['word'] }}</b> (<i class="translate_style">{{ $item['translate'] }}</i>)</th>
                <th></th>
            </tr>
            <tr class="items">
                <td style="width:50%">
                    <p>{{ $item['use_one'] }}</p>
                    <p>{{ $item['use_two'] }}</p>
                    <p>{{ $item['use_three'] }}</p>
                </td>
                <td style="width:50%">
                    <p>{{ $item['translate_one'] }}</p>
                    <p>{{ $item['translate_two'] }}</p>
                    <p>{{ $item['translate_three'] }}</p>
                </td>
            </tr>

        </table>
        @endforeach
    </div>
</body>

</html>