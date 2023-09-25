<?php

$dados_jason ='dadosClientes.json';

$jason_content = file_get_contents($dados_jason);

$dadosClientes = json_decode($jason_content, true);

foreach ($dadosClientes['dadosClientes'] as $cliente){
    echo 'Nome: '. $cliente['nome'] . " ";
    
    $data = date('d/m/Y', strtotime($cliente['dataNascimento'])) . "<br>";
    
    echo '- Data de Nascimento: ' . $data;
    echo "<br>";

    
}

?>