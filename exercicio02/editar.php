<?php

include_once "conexao.php";

try {
    $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
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

    $update = $conectar->prepare("UPDATE dadosclientes SET cpf = :cpf, nome = :nome, dataNascimento = :dataNascimento, sexo = :sexo, estadoCivil = :estadoCivil, email = :email, cidade = :cidade, endereco = :endereco, numero = :numero, bairro = :bairro, contatos = :contatos WHERE id = :id");
    $update->bindParam(':id', $id);
    $update->bindParam(':cpf', $cpf);
    $update->bindParam(':nome', $nome);
    $update->bindParam(':dataNascimento', $dataNascimento);
    $update->bindParam(':sexo', $sexo);
    $update->bindParam(':estadoCivil', $estadoCivil);
    $update->bindParam(':email', $email);
    $update->bindParam(':cidade', $cidade);
    $update->bindParam(':endereco', $endereco);
    $update->bindParam(':numero', $numero);
    $update->bindParam(':bairro', $bairro);
    $update->bindParam(':contatos', $contatos);

    $update->execute();

    header("location: index.php");
    


} catch (PDOException $e) {
    echo 'Erro: ' . $e->getMessage();
}

?>