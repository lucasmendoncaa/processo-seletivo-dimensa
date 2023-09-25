<?php

include_once "conexao.php";

try {
    $cpf = filter_var($_POST['cpf']);
    $nome = filter_var($_POST['nome']);
    $dataNascimento = filter_var($_POST['dataNascimento']);
    $sexo = filter_var($_POST['sexo']);
    $estadoCivil = filter_var($_POST['estadoCivil']);
    $email = filter_var($_POST['email']);
    $cidade = filter_var($_POST['cidade']);
    $endereco = filter_var($_POST['endereco']);
    $numero = filter_var($_POST['numero']);
    $bairro = filter_var($_POST['bairro']);
    $contatos = filter_var($_POST['contatos']);

    $insert = $conectar->prepare("INSERT INTO dadosclientes (cpf, nome, dataNascimento, sexo, estadoCivil, email, cidade, endereco, numero, bairro, contatos) VALUES (:cpf, :nome, :dataNascimento, :sexo, :estadoCivil, :email, :cidade, :endereco, :numero, :bairro, :contatos)");
    $insert->bindParam(':cpf', $cpf);
    $insert->bindParam(':nome', $nome);
    $insert->bindParam(':dataNascimento', $dataNascimento);
    $insert->bindParam(':sexo', $sexo);
    $insert->bindParam(':estadoCivil', $estadoCivil);
    $insert->bindParam(':email', $email);
    $insert->bindParam(':cidade', $cidade);
    $insert->bindParam(':endereco', $endereco);
    $insert->bindParam(':numero', $numero);
    $insert->bindParam(':bairro', $bairro);
    $insert->bindParam(':contatos', $contatos);

    $insert->execute();

    header("location: index.php");
    


} catch (PDOException $e) {
    echo 'Erro: ' . $e->getMessage();
}

?>