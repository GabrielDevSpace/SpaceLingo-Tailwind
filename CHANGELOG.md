
<!-- 
## [1.0.0] - 2024-01-30
### Adicionado
- Nova funcionalidade incrível.

### Corrigido
- Bug irritante foi corrigido.

## [0.2.0] - 2024-01-15
### Adicionado
- Outra funcionalidade emocionante.

## [0.1.1] - 2024-01-01
### Corrigido
- Correção de um bug específico.

*** ROTINA DE ATUALIZACAO DE VERSAO ***
-: config/app.php
    : Linha 20 'version' => '1.0.0',
-: Git Tag para crair recursos

--> 
## [1.5.1] - 2024-02-25
### Editado
- Editado V2 de Five Thousand, apenas campo translate.

## [1.5.0] - 2024-02-25
### Adicionado
- Adicionado Funcao Gerar PDF com resultado de Five Thousand - 5k palavras mais usadas no ingles.
- Adicionado V2 de Five Thousand, separando cada caso de uso e sua traducao em colunas separadas no banco.

## [1.4.0] - 2024-02-06
### Adicionado
- Adicionado Integração com API chatGPT para coletar 5k palavras mais usadas no ingles, exemplos de uso, 3 questoes para testes, etc. 
- Complementado funcao chatGPT na funcao ja existente five-thousand
- Função ainda experimental beta

## [1.3.1] - 2024-02-02
### Corrigido
- Corrigido Layout e Icones Navbar e adicionado menu WeeklyTest.

## [1.3.0] - 2024-02-02
### Adicionado
- Adicionado funcao Copy Prompt ChatGTP / Bard para "Add New Vocabulary", Ao entrar no cadastro de um novo vocabulario é gerado um prompt para retornar a Traducao, Exemplos de Uso dessa nova palavra.

## [1.2.1] - 2024-02-01
### Corrigido
- Correção no layout de botoes, sombras em divs, Cores e padronizacao de textos.

## [1.2.0] - 2024-01-31
### Adicionado
- Incluido funcionalidade adicionar vocabulario digitado no input "Search Vocabulary or Translate" - Ao procurar um vocabulario e ao clicar em seguida Add New Vocabulary, o valor pesquisado é repassado para a funcao NewRegister.Create.

## [1.1.1] - 2024-01-30
### Corrigido
- Correção no comportamento do textarea id="notes" na funcao Notes. Descricao: Ao apagar o conteudo do textarea ele enviava um evento livewire e reiniciava o componente - ultilizado wire:model.lazy para atrazar o evento ate que o foco saia do textarea

## [1.1.0] - 2024-01-30
### Adicionado
- Incluido funcionalidade * Versão (Footer) * e CHANGELOG para acompanhamento de evolução do software.

## [1.0.0] - 2024-01-30
- Primeira versão do projeto.
    - Funcoes Vocabulary, Weekly Test, Notes

