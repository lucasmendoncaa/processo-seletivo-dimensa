<?php
//inclui a conexão do php com banco de dados
include_once "conexao.php";

try {
    // execução da intrução sql. Cunsulta sql.
    $consulta = $conectar->query("SELECT * FROM dadosclientes"); //seleciona todos os campos da tabela "dadosclientes"

    // Criando o link para criar um novo cadastro
    echo "<a href='formCadastro.php'>Novo Cadastro</a><br><br> Lista de Clientes";

    echo "<table border='1'><tr>
    <td>CPF</td>
    <td>Nome</td>
    <td>Data de Nascimento</td>
    <td>Sexo</td>
    <td>Estado Civil</td>
    <td>Email</td>
    <td>Cidade</td>
    <td>Endereço</td>
    <td>Número</td>
    <td>Bairro</td>
    <td>Contatos</td>
    <td>Ações</td></tr>";

    // Enquanto linha == a percorrer todos os registros que forem encontrados na tabela. Função "fetch" percorre toda a tabela.
    while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)){
        echo "<tr>
        <td>$linha[CPF]</td>
        <td>$linha[nome]</td>
        <td>$linha[dataNascimento]</td>
        <td>$linha[sexo]</td>
        <td>$linha[estadoCivil]</td>
        <td>$linha[email]</td>
        <td>$linha[cidade]</td>
        <td>$linha[endereco]</td>
        <td>$linha[numero]</td>
        <td>$linha[bairro]</td>
        <td>$linha[contatos]</td>
        <td><a href='formEditar.php?id=$linha[id]'>Editar</a> - <a href='excluir.php?id=$linha[id]'>Excluir</a></td></tr>";
    }

    echo "</table>";

    

    echo $consulta->rowCount() . " Cadastros Exibidos";
} catch (PDOException $e) {
    echo $e->getMessage();
}

?>