<?php

//Criado uma variável para receber o caminho do arquivo .json
$dados_jason ='dadosClientes.json';

//Criado nova variável para receber a função "file_get_contents" do caminho onde está localizado o dadosClientes.json.
//Função esta que lê todo o conteudo de um arquivo para um string.
$jason_content = file_get_contents($dados_jason);

//após receber esse arquivo, usamos a função json_decode para decodificar essa string, passando o parâmetro "true" retornamos os objetos json como arrays associativos.
$dadosClientes = json_decode($jason_content, true);

//echo var_dump($dadosClientes);

//Utilizando o foreach, conseguimos percorrer todo o array. A cada iteração, o valor do elemento atual é atribuido a $cliente. Sendo assim percorrendo todos os elementos nome e dataNascimento e atribuindo a $cliente por vez.
foreach ($dadosClientes['dadosClientes'] as $cliente){
    echo 'Nome: '. $cliente['nome'] . " ";
    //echo $cliente['dataNascimento'] . "<br>";
    //var_dump($cliente['dataNascimento']);

    // função date modifica a string da data no formato que você escolher, com observação no "Y" do ano, quando é minúculo é passado ano com 2 digitos, quando é maiusculo é passado anos com 4 digitos.
    // função strtotime, converte qualquer entrada de texto no formato data/hora para um valor "inteiro"(epoch/Unix)
    //Crédito: https://php.com.br/53?manipulando-datas-com-php
    $data = date('d/m/Y', strtotime($cliente['dataNascimento'])) . "<br>";
    
    //Declarei uma variável para as funções date e strtotime para depois conseguir passa-la para a tela com um texto.
    echo '- Data de Nascimento: ' . $data;
    echo "<br>";

    /*CREDITOS:
    https://www.php.net/manual/pt_BR/function.file-get-contents.php
    https://www.php.net/manual/pt_BR/function.json-decode
    https://www.php.net/manual/pt_BR/control-structures.foreach.php
    https://www.php.net/manual/pt_BR/function.date.php
    https://www.php.net/manual/pt_BR/function.strtotime
    */
    
}

?>