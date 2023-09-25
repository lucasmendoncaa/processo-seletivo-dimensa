<?php
// se a conexão ocorrer com sucesso, executa try, se não, executa mensagem no catch.
try {
    // faz conexão com o banco de dados
    $conectar = new PDO("mysql:host=localhost;port=3306;dbname=clientes;", "root", '');

} catch (PDOException $e) {
    // Caso ocorra alguem erro na conexão com o banco, exibe uma mensagem na tela.
    echo 'Falha ao conectar com o banco de dados: ' . $e->getMessage();// função que recebe mensagem de erro.
}

?>