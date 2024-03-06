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

            background-color: #fff;


        }

        h1,
        h2 {
            text-align: center;
            color: #674ea7;
        }

        ul {
            list-style-type: solid;
            padding-left: 20px;
            padding-bottom: 10px;
            color: #674ea7;
            font-weight: bold;
            font-size: 13px;
        }

        li {
            margin-bottom: 10px;
        }

        p,
        strong {
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

        .prefixos {
            font-size: 12px;
            color: #343434;
        }

        .sufixos {
            font-size: 12px;
            color: #343434;
        }
    </style>
</head>

<body>
    <div>
        <h1>SpaceLingo</h1>
        <h2>as 5 Mil Palavras Mais Usadas em <i>(Inglês)</i> </h2>

        <p>Se está em busca de um completo domínio da língua inglesa, o <strong>SpaceLingo</strong> é a solução ideal para você!</p>
        <ul>
            <li>Desvende palavras essenciais</li>
            <li>Torne-se expert nas regras da gramática moderna</li>
            <li>Domine o uso preciso dos numerais</li>
            <li>Explore as principais expressões e seus contextos</li>
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

    <!-- ############################# /PREFIXOS #############################-->
    <div class="prefixos">
        <h2 style="color: #674ea7;">O que são e quando utilizar os Prefixos?</h2>
        <p>
            Os prefixos são elementos linguísticos adicionados ao <b>início</b> de uma palavra para modificar seu significado.
            Em inglês, os prefixos desempenham um papel crucial na formação de novas palavras e na expressão de diferentes variantes de significado.
            <br>
            <br>
            <b>Exemplos:</b>
        <ul style="color: #343434; font-weight:normal, font-size:12px ">
            <li>
                Palavra Base: <b>Happy</b> (Feliz), ao adicionarmos o prefixo <b>Un-</b> que geralmente significa oposto temos o resultado <b>Unhappy</b> (infeliz).
            </li>
            <li>
                Palavra Base: <b>Respect</b> (Respeito), ao adicionarmos o prefixo <b>Ir-</b> que geralmente indica negação, temos o resultado <b>Irrespect</b> (Irrespeitoso).
            </li>
            <li>
                Palavra Base: <b>Complete</b> (Completo), ao adicionarmos o prefixo <b>Im-</b> que geralmente indica negação, temos o resultado <b>Imcomplete</b> (Incompleto).

            </li>
            <li>
                Palavra Base: <b>Possible</b> (Possível), ao adicionarmos o prefixo <b>Im-</b> que geralmente indica negação, temos o resultado <b>Impossible</b> (Impossível).
            </li>
        </ul>
        </p>

        <h3 style="color: #674ea7;">A Importância dos Prefixos:</h3>
        <p>
            Os prefixos desempenham um papel vital na língua inglesa, pois enriquecem o vocabulário e permitem a criação de palavras com significados mais precisos.
            Compreender os prefixos facilita rápido enriquecimento de nosso vocabulario.
        </p>
        <h3 style="color: #674ea7;">Dicas para Usar Prefixos:</h3>
        <p style="padding-left:20px"><strong>Compreenda o Significado:</strong> Entenda o significado geral do prefixo para interpretar a palavra modificada.</p>
        <p style="padding-left:20px"><strong>Analise o Contexto:</strong> Considere o contexto da frase para uma correta aplicação do prefixo.</p>
        <h3 style="color: #674ea7; padding-top:10px; padding-bottom:10px">Exemplos dos principais Prefixos:</h3>


        <div style="padding:10px; background-color: #6aa84f; border-radius: 4px 4px 0px 0px;">
            <span style="color: #fff; font-weight:bold; font-size:12px">UN (Não, Oposto)</span>
        </div>
        <div style="padding:10px; background-color: #e6e6e6; margin-bottom:10px">
            <p>
                <span style="color: #674ea7;">Palavra Base + Prefixo:</span>
                Happy (Feliz) | Unhappy (Infeliz)
            </p>
            <p><span style="color: #674ea7;">Base:</span> She is happy with her new job. (Ela está feliz com o novo emprego.)</p>
            <p><span style="color: #674ea7;">Prefixo:</span> She is unhappy with her current situation. (Ela está infeliz com a situação atual.)</p>
        </div>

        <div style="padding:10px; background-color: #6aa84f; border-radius: 4px 4px 0px 0px;">
            <span style="color: #fff; font-weight:bold; font-size:12px">MIS (Erro)</span>
        </div>
        <div style="padding:10px; background-color: #e6e6e6; margin-bottom:10px">
            <p>
                <span style="color: #674ea7;">Palavra Base + Prefixo:</span>
                Understand (Compreender) | Misunderstand (Mal-entender)
            </p>
            <p><span style="color: #674ea7;">Base:</span> I understand the instructions. (Eu compreendo as instruções.)</p>
            <p><span style="color: #674ea7;">Prefixo:</span> Sorry, I misunderstood your message. (Desculpe, eu mal-entendi sua mensagem.)</p>
        </div>

        <div style="padding:10px; background-color: #6aa84f; border-radius: 4px 4px 0px 0px;">
            <span style="color: #fff; font-weight:bold; font-size:12px">DIS (Negativo)</span>
        </div>
        <div style="padding:10px; background-color: #e6e6e6; margin-bottom:10px">
            <p>
                <span style="color: #674ea7;">Palavra Base + Prefixo:</span>
                Connect (Conectar) | Disconnect (Desconectar)
            </p>
            <p><span style="color: #674ea7;">Base:</span> The devices are connected to the internet. (Os dispositivos estão conectados à internet.)</p>
            <p><span style="color: #674ea7;">Prefixo:</span> Please disconnect the power cable before cleaning. (Por favor, desconecte o cabo de energia antes de limpar.)</p>
        </div>

        <div style="padding:10px; background-color: #6aa84f; border-radius: 4px 4px 0px 0px;">
            <span style="color: #fff; font-weight:bold; font-size:12px">IN (Negativo, Oposto)</span>
        </div>
        <div style="padding:10px; background-color: #e6e6e6; margin-bottom:10px">
            <p>
                <span style="color: #674ea7;">Palavra Base + Prefixo:</span>
                Active (Ativo) | Inactive (Inativo)
            </p>
            <p><span style="color: #674ea7;">Base:</span> The system is active and running smoothly. (O sistema está ativo e funcionando perfeitamente.)</p>
            <p><span style="color: #674ea7;">Prefixo:</span> Make sure to set your status to inactive when you're not available. (Certifique-se de definir seu status como inativo quando não estiver disponível.)</p>
        </div>

        <div style="padding:10px; background-color: #6aa84f; border-radius: 4px 4px 0px 0px;">
            <span style="color: #fff; font-weight:bold; font-size:12px">ANTI (Contra, Oposto)</span>
        </div>
        <div style="padding:10px; background-color: #e6e6e6; margin-bottom:10px">
            <p>
                <span style="color: #674ea7;">Palavra Base + Prefixo:</span>
                Social (Social) | Anti-social (Antissocial)
            </p>
            <p><span style="color: #674ea7;">Base:</span> She is a very social person, always making new friends. (Ela é uma pessoa muito social, sempre fazendo novos amigos.)</p>
            <p><span style="color: #674ea7;">Prefixo:</span> Unfortunately, he tends to be antissocial at gatherings. (Infelizmente, ele costuma ser antissocial em encontros sociais.)</p>
        </div>

        <div style="padding:10px; background-color: #6aa84f; border-radius: 4px 4px 0px 0px;">
            <span style="color: #fff; font-weight:bold; font-size:12px">PRE (Anterior)</span>
        </div>
        <div style="padding:10px; background-color: #e6e6e6; margin-bottom:10px">
            <p>
                <span style="color: #674ea7;">Palavra Base + Prefixo:</span>
                Order (Ordem) | Preorder (Pré-encomenda)
            </p>
            <p><span style="color: #674ea7;">Base:</span> Please arrange the items in alphabetical order. (Por favor, organize os itens em ordem alfabética.)</p>
            <p><span style="color: #674ea7;">Prefixo:</span> You can preorder the latest version of the book online. (Você pode fazer a pré-encomenda da versão mais recente do livro online.)</p>
        </div>

        <div style="padding:10px; background-color: #6aa84f; border-radius: 4px 4px 0px 0px;">
            <span style="color: #fff; font-weight:bold; font-size:12px">EX (Anterioridade, Afastamento)</span>
        </div>
        <div style="padding:10px; background-color: #e6e6e6; margin-bottom:10px">
            <p>
                <span style="color: #674ea7;">Palavra Base + Prefixo:</span>
                Husband (Marido) | Ex-husband (Ex-marido)
            </p>
            <p><span style="color: #674ea7;">Base:</span> She is currently married to her husband. (Ela está atualmente casada com seu marido.)</p>
            <p><span style="color: #674ea7;">Prefixo:</span> My ex-husband and I remain friends after the divorce. (Meu ex-marido e eu continuamos amigos após o divórcio.)</p>
        </div>

        <div style="padding:10px; background-color: #6aa84f; border-radius: 4px 4px 0px 0px;">
            <span style="color: #fff; font-weight:bold; font-size:12px">PRO (A Favor de, A Favor de, Antes)</span>
        </div>
        <div style="padding:10px; background-color: #e6e6e6; margin-bottom:10px">
            <p>
                <span style="color: #674ea7;">Palavra Base + Prefixo:</span>
                Choice (Escolha) | Pro-choice (A favor da escolha)
            </p>
            <p><span style="color: #674ea7;">Base:</span> Everyone should have the right to make their own choices. (Todos deveriam ter o direito de fazer suas próprias escolhas.)</p>
            <p><span style="color: #674ea7;">Prefixo:</span> She is a strong advocate for pro-choice policies. (Ela é uma grande defensora de políticas a favor da escolha.)</p>
        </div>

        <div style="padding:10px; background-color: #6aa84f; border-radius: 4px 4px 0px 0px;">
            <span style="color: #fff; font-weight:bold; font-size:12px">RE (Repetição)</span>
        </div>
        <div style="padding:10px; background-color: #e6e6e6; margin-bottom:10px">
            <p>
                <span style="color: #674ea7;">Palavra Base + Prefixo:</span>
                Do (Fazer) | Redo (Refazer)
            </p>
            <p><span style="color: #674ea7;">Base:</span> I need to do my homework before going out. (Eu preciso fazer minha lição de casa antes de sair.)</p>
            <p><span style="color: #674ea7;">Prefixo:</span> Please redo this assignment and submit it again. (Por favor, refaça esta tarefa e envie novamente.)</p>
        </div>

        <div style="padding:10px; background-color: #6aa84f; border-radius: 4px 4px 0px 0px;">
            <span style="color: #fff; font-weight:bold; font-size:12px">EN (Fazer, Colocar em)</span>
        </div>
        <div style="padding:10px; background-color: #e6e6e6; margin-bottom:10px">
            <p>
                <span style="color: #674ea7;">Palavra Base + Prefixo:</span>
                Courage (Coragem) | Encourage (Encorajar)
            </p>
            <p><span style="color: #674ea7;">Base:</span> She showed great courage during the difficult times. (Ela demonstrou grande coragem durante os momentos difíceis.)</p>
            <p><span style="color: #674ea7;">Prefixo:</span> I always try to encourage my friends to pursue their dreams. (Eu sempre tento encorajar meus amigos a perseguirem seus sonhos.)</p>
        </div>

        <div style="padding:10px; background-color: #6aa84f; border-radius: 4px 4px 0px 0px;">
            <span style="color: #fff; font-weight:bold; font-size:12px">BI (Dois, Duplo)</span>
        </div>
        <div style="padding:10px; background-color: #e6e6e6; margin-bottom:10px">
            <p>
                <span style="color: #674ea7;">Palavra Base + Prefixo:</span>
                Monthly (Mensal) | Bimonthly (Bimensal)
            </p>
            <p><span style="color: #674ea7;">Base:</span> The rent is due on a monthly basis. (O aluguel vence mensalmente.)</p>
            <p><span style="color: #674ea7;">Prefixo:</span> The magazine is published bimonthly, every two months. (A revista é publicada bimensalmente, a cada dois meses.)</p>
        </div>

        <div style="padding:10px; background-color: #6aa84f; border-radius: 4px 4px 0px 0px;">
            <span style="color: #fff; font-weight:bold; font-size:12px">CO (Junto, Em Conjunto)</span>
        </div>
        <div style="padding:10px; background-color: #e6e6e6; margin-bottom:10px">
            <p>
                <span style="color: #674ea7;">Palavra Base + Prefixo:</span>
                Operate (Operar) | Cooperate (Cooperar)
            </p>
            <p><span style="color: #674ea7;">Base:</span> The two companies operate independently. (As duas empresas operam independentemente.)</p>
            <p><span style="color: #674ea7;">Prefixo:</span> It's important to cooperate with your team to achieve success. (É importante cooperar com sua equipe para alcançar o sucesso.)</p>
        </div>

        <div style="padding:10px; background-color: #6aa84f; border-radius: 4px 4px 0px 0px;">
            <span style="color: #fff; font-weight:bold; font-size:12px">AUTO (Por Si Próprio)</span>
        </div>
        <div style="padding:10px; background-color: #e6e6e6; margin-bottom:10px">
            <p>
                <span style="color: #674ea7;">Palavra Base + Prefixo:</span>
                Correct (Corrigir) | Autocorrect (Autocorrigir)
            </p>
            <p><span style="color: #674ea7;">Base:</span> Please correct any mistakes in your assignment. (Por favor, corrija quaisquer erros em sua tarefa.)</p>
            <p><span style="color: #674ea7;">Prefixo:</span> The autocorrect feature on your phone can help avoid typos. (A função de autocorreção no seu telefone pode ajudar a evitar erros de digitação.)</p>
        </div>

        <div style="padding:10px; background-color: #6aa84f; border-radius: 4px 4px 0px 0px;">
            <span style="color: #fff; font-weight:bold; font-size:12px">POST (Depois, Pós)</span>
        </div>
        <div style="padding:10px; background-color: #e6e6e6; margin-bottom:10px">
            <p>
                <span style="color: #674ea7;">Palavra Base + Prefixo:</span>
                Graduate (Formar-se) | Postgraduate (Pós-graduação)
            </p>
            <p><span style="color: #674ea7;">Base:</span> She will graduate from college next year. (Ela se formará na faculdade no próximo ano.)</p>
            <p><span style="color: #674ea7;">Prefixo:</span> After completing her undergraduate studies, she pursued a postgraduate degree. (Após concluir seus estudos de graduação, ela buscou um diploma de pós-graduação.)</p>
        </div>

        <div style="padding:10px; background-color: #6aa84f; border-radius: 4px 4px 0px 0px;">
            <span style="color: #fff; font-weight:bold; font-size:12px">SUPER (Acima, Além)</span>
        </div>
        <div style="padding:10px; background-color: #e6e6e6; margin-bottom:10px">
            <p>
                <span style="color: #674ea7;">Palavra Base + Prefixo:</span>
                Hero (Herói) | Superhero (Super-herói)
            </p>
            <p><span style="color: #674ea7;">Base:</span> He is considered a hero in his community. (Ele é considerado um herói em sua comunidade.)</p>
            <p><span style="color: #674ea7;">Prefixo:</span> Many children look up to superheroes as role models. (Muitas crianças admiram super-heróis como modelos a serem seguidos.)</p>
        </div>

        <div style="padding:10px; background-color: #6aa84f; border-radius: 4px 4px 0px 0px;">
            <span style="color: #fff; font-weight:bold; font-size:12px">OVER (Excesso)</span>
        </div>
        <div style="padding:10px; background-color: #e6e6e6; margin-bottom:10px">
            <p>
                <span style="color: #674ea7;">Palavra Base + Prefixo:</span>
                Load (Carga) | Overload (Sobrecarga)
            </p>
            <p><span style="color: #674ea7;">Base:</span> The truck can handle a heavy load of goods. (O caminhão pode lidar com uma carga pesada de mercadorias.)</p>
            <p><span style="color: #674ea7;">Prefixo:</span> Be careful not to overload the washing machine with too many clothes. (Tenha cuidado para não sobrecarregar a máquina de lavar com roupas demais.)</p>
        </div>

        <div style="padding:10px; background-color: #6aa84f; border-radius: 4px 4px 0px 0px;">
            <span style="color: #fff; font-weight:bold; font-size:12px">UNDER (Insuficiência)</span>
        </div>
        <div style="padding:10px; background-color: #e6e6e6; margin-bottom:10px">
            <p>
                <span style="color: #674ea7;">Palavra Base + Prefixo:</span>
                Estimate (Estimar) | Underestimate (Subestimar)
            </p>
            <p><span style="color: #674ea7;">Base:</span> It's important to make a realistic estimate of project costs. (É importante fazer uma estimativa realista dos custos do projeto.)</p>
            <p><span style="color: #674ea7;">Prefixo:</span> Don't underestimate the challenges of starting your own business. (Não subestime os desafios de iniciar seu próprio negócio.)</p>
        </div>

        <div style="padding:10px; background-color: #6aa84f; border-radius: 4px 4px 0px 0px;">
            <span style="color: #fff; font-weight:bold; font-size:12px">SUB (Abaixo, Sob)</span>
        </div>
        <div style="padding:10px; background-color: #e6e6e6; margin-bottom:10px">
            <p>
                <span style="color: #674ea7;">Palavra Base + Prefixo:</span>
                Marine (Marinho) | Submarine (Submarino)
            </p>
            <p><span style="color: #674ea7;">Base:</span> The marine life in the ocean is diverse and fascinating. (A vida marinha no oceano é diversa e fascinante.)</p>
            <p><span style="color: #674ea7;">Prefixo:</span> Submarines are used for underwater exploration and defense. (Submarinos são usados para exploração e defesa subaquática.)</p>
        </div>

        <div style="padding:10px; background-color: #6aa84f; border-radius: 4px 4px 0px 0px;">
            <span style="color: #fff; font-weight:bold; font-size:12px">INTER (Entre)</span>
        </div>
        <div style="padding:10px; background-color: #e6e6e6; margin-bottom:10px">
            <p>
                <span style="color: #674ea7;">Palavra Base + Prefixo:</span>
                National (Nacional) | International (Internacional)
            </p>
            <p><span style="color: #674ea7;">Base:</span> The national team performed well in the tournament. (A equipe nacional teve um bom desempenho no torneio.)</p>
            <p><span style="color: #674ea7;">Prefixo:</span> The company has expanded its operations to international markets. (A empresa expandiu suas operações para mercados internacionais.)</p>
        </div>

    </div>




    <!-- ############################# SUFIXOS #############################-->
    <div class="sufixos">
        <h2 style="color: #006666;">O que são e quando utilizar os Sufixos?</h2>
        <p>
            Diferente aos prefixos, os sufixos são elementos linguísticos adicionados ao <b>final</b> de uma palavra para modificar seu significado.
            Em inglês, da mesma forma os sufixos desempenham um papel crucial na formação de novas palavras e na expressão de diferentes variantes de significado.
            <br>
            <br>
            <b>Exemplos:</b>
        <ul style="color: #343434; font-weight:normal; font-size:12px ">
            <li>
                Palavra Base: <b>Play</b> (Jogar), ao adicionarmos o sufixo <b>-er</b> que geralmente indica alguém que faz algo, temos o resultado <b>Player</b> (Jogador).
            </li>
            <li>
                Palavra Base: <b>Help</b> (Ajudar), ao adicionarmos o sufixo <b>-ful</b> que geralmente indica cheio de, temos o resultado <b>Helpful</b> (Prestativo).
            </li>
            <li>
                Palavra Base: <b>Wonder</b> (Maravilha), ao adicionarmos o sufixo <b>-ous</b> que geralmente indica cheio de, temos o resultado <b>Wonderous</b> (Maravilhoso).

            </li>
            <li>
                Palavra Base: <b>Play</b> (Jogar), ao adicionarmos o sufixo <b>-ing</b> que geralmente indica uma ação em progresso, temos o resultado <b>Playing</b> (Jogando).
            </li>
        </ul>

        </p>

        <h3 style="color: #006666;">A Importância dos Sufixos:</h3>
        <p>
            Os sufixos desempenham um papel vital na língua inglesa, pois enriquecem o vocabulário e permitem a criação de palavras com significados mais precisos.
            Compreender os sufixos facilita o rápido enriquecimento do nosso vocabulário.
        </p>
        <h3 style="color: #006666;">Dicas para Usar Sufixos:</h3>
        <p style="padding-left:20px"><strong>Compreenda o Significado:</strong> Entenda o significado geral do sufixo para interpretar a palavra modificada.</p>
        <p style="padding-left:20px"><strong>Analise o Contexto:</strong> Considere o contexto da frase para uma correta aplicação do sufixo.</p>
        <h3 style="color: #006666; padding-top:10px; padding-bottom:10px">Exemplos dos principais Sufixos:</h3>
    </div>
    <!-- ############################# /SUFIXOS #############################-->

    <footer>
        <div>FOOTER</div>
    </footer>
</body>

</html>