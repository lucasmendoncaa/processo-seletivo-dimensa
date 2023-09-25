<?php
$login = 'root';
$password = '';
try {
    $conectar = new PDO("mysql:localhost;port=3306;dbname=clientes;", $login, $password);
} catch (PDOException $e) {
    echo 'Falha ao conectar com o banco de dados: ' . $e->getMessage();
}
//LISTAR TODOS OS CLIENTES
try {
    $consulta = $conectar->query("SELECT * FROM dadosclientes LEFT JOIN pedidos ON dadosclientes.id = pedidos.clientespedidos");

    echo "<h3>Lista de Clientes</h3>";

    echo "<table border='1'><tr>
    <td>Nome</td>
    <td>Data de Nascimento</td>
    <td>Sexo</td>
    <td>Estado Civil</td>
    <td>Cidade</td>
    <td>Pedido</td>
    <td>Data do Pedido</td>
    <td>Valor Total Pedido</td></tr>";

    while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)){
        $dataN = date('d-m-Y', strtotime($linha['dataNascimento']));
        
        //Precisei verificar se a DataPedido era Null por conta de uma data aleatória que estava sendo criada em clientes que não tem pedido.
        //condição ? valor_se_verdadeiro : valor_se_falso;
        $dataP = ($linha['DataPedido'] !== null) ? date('d-m-Y', strtotime($linha['DataPedido'])) : ""; 
        echo "<tr>
        <td>$linha[nome]</td>
        <td>$dataN</td>
        <td>$linha[sexo]</td>
        <td>$linha[estadoCivil]</td>
        <td>$linha[cidade]</td>
        <td>$linha[Pedido]</td>
        <td>$dataP</td>
        <td>$linha[ValorTotal]</td>
        </tr>";

    
    }
    echo "</table>";

    echo $consulta->rowCount() . " Cadastros Exibidos";
} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
}

//NOME DOS CLIENTES E VALOR TOTAL DOS PEDIDOS
try {
    $consulta = $conectar->query("SELECT * FROM dadosclientes JOIN pedidos ON dadosclientes.id = pedidos.clientespedidos ORDER BY ValorTotal DESC");
    echo "<h3>Nome dos Clientes e Valor Total dos Pedidos</h3>";

    echo "<table border='1'><tr>
    <td>Nome</td>
    <td>Valor Total dos Pedidos</td></tr>";

    while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)){
        echo "<tr>
        <td>$linha[nome]</td>
        <td>$linha[ValorTotal]</td>

        </tr>";
    }
    echo "</table>";
} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
}


//CLIENTES DO SEXO 'M' QUE FIZERAM PEDIDOS APÓS DIA 01-03-2023
try {
    $consulta = $conectar->query("SELECT dadosclientes.nome, pedidos.DataPedido FROM pedidos JOIN dadosclientes
    ON dadosclientes.id = pedidos.clientespedidos
    WHERE pedidos.DataPedido > '2023-03-01' AND dadosclientes.sexo = 'M';");
    echo "<h3>Clientes Homens com Pedido Após 01-03-2023</h3>";

    echo "<table border='1'><tr>
    <td>Nome</td>
    <td>Data do Pedido</td></tr>";

    while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)){
        $dataP = date('d-m-Y', strtotime($linha['DataPedido']));
        echo "<tr>
        <td>$linha[nome]</td>
        <td>$dataP</td>

        </tr>";
    }
    echo "</table>";
} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
}


//LISTAR TODOS OS CLIENTES DE LEOPOLDINA
try {
    $consulta = $conectar->query("SELECT dadosclientes.nome,pedidos.pedido, dadosclientes.cidade FROM pedidos JOIN dadosclientes
    ON dadosclientes.id = pedidos.clientespedidos
    WHERE dadosclientes.cidade = 'Leopoldina';");
    echo "<h3>Nome dos Clientes de Leopoldina</h3>";

    echo "<table border='1'><tr>
    <td>Nome</td>
    <td>Pedido</td>
    <td>Cidade</td>
        </tr>";

    while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)){
        echo "<tr>
        <td>$linha[nome]</td>
        <td>$linha[pedido]</td>
        <td>$linha[cidade]</td>
        </tr>";
    }
    echo "</table>";
} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
}


//CONTAR QUANTOS CLIENTES SÃO CASADOS
try {
    $consulta = $conectar->query("SELECT COUNT(estadoCivil) FROM dadosclientes WHERE estadoCivil = 'casado'");

    $linha = $consulta->fetch(PDO::FETCH_ASSOC);
    $totCasados = $linha['COUNT(estadoCivil)'];
    echo "<h3>Quantidade de Clientes Casados</h3>";

    echo "<table border='1'><tr>
    <td>Quantidade</td>
        </tr>";

        
    echo "<tr>
        <td>$totCasados</td>
        
        </tr>";
    echo "</table>";
} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
}
?>