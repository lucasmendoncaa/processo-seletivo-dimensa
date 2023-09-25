
<form action="cadastrar.php" method="post">
CPF: <input type="text" name="cpf" id="cpf"/><br>
Nome: <input type="text" name="nome" id="nome"/><br>
Data de Nascimento: <input type="text" name="dataNascimento" id="dataNascimento"/><br>
Sexo: <label><input type="radio" name="sexo" value="M"<?php if (['sexo']=="M") echo 'checked'?> id="sexo"/> Masculino
             <input type="radio" name="sexo" value="F"<?php if (['sexo']=="F") echo 'checked'?> id="sexo"/>Feminino<br></label>
Estado Civil: <input type="text" name="estadoCivil" id="estadoCivil"/><br>
Email: <input type="text" name="email" id="email"/><br>
Cidade: <input type="text" name="cidade" id="cidade"/><br>
Endereço: <input type="text" name="endereco" id="endereco"/><br>
Número: <input type="text" name="numero" id="numero"/><br>
Bairro: <input type="text" name="bairro" id="bairro"/><br>
Contatos: <input type="text" name="contatos" id="contatos"/><br>
<input type="submit" value="Cadastrar"/>
</form>
