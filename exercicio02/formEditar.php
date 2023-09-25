<?php

include_once "conexao.php";

$id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
$consulta = $conectar->query("SELECT * FROM dadosclientes where id = '$id'");
$linha = $consulta->fetch(PDO::FETCH_ASSOC);


?>


<form action="editar.php" method="post">
CPF: <input type="text" name="cpf" value="<?php echo $linha['CPF']?>" id="cpf"/><br>
Nome: <input type="text" name="nome" value="<?php echo $linha['nome']?>" id="nome"/><br>
Data de Nascimento: <input type="text" name="dataNascimento" value="<?php echo $linha['dataNascimento']?>" id="dataNascimento"/><br>
Sexo: <label><input type="radio" name="sexo" value="M"<?php if ($linha['sexo']=="M") echo 'checked'; echo $linha['sexo']?> id="sexo"/>Masculino
             <input type="radio" name="sexo" value="F"<?php if ($linha['sexo']=="F") echo 'checked'; echo $linha['sexo']?> id="sexo"/>Feminino<br></label>
Estado Civil: <input type="text" name="estadoCivil" value="<?php echo $linha['estadoCivil']?>" id="estadoCivil"/><br>
Email: <input type="text" name="email" value="<?php echo $linha['email']?>" id="email"/><br>
Cidade: <input type="text" name="cidade" value="<?php echo $linha['cidade']?>" id="cidade"/><br>
Endereço: <input type="text" name="endereco" value="<?php echo $linha['endereco']?>" id="endereco"/><br>
Número: <input type="text" name="numero" value="<?php echo $linha['numero']?>" id="numero"/><br>
Bairro: <input type="text" name="bairro" value="<?php echo $linha['bairro']?>" id="bairro"/><br>
Contatos: <input type="text" name="contatos" value="<?php echo $linha['contatos']?>" id="contatos"/><br>
<input type="hidden" name="id" value="<?php echo $linha['id']?>"/>
<input type="submit" value="Editar"/>
</form>
