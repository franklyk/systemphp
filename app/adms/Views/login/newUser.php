<?php 
$name = '';
$email = '';
$password = '';

if (isset($this->data['form'])) {
    $valForm = $this->data['form'];

    $user = $valForm['user'];
    $password = $valForm['password'];
}

// echo password_hash("123456a", PASSWORD_DEFAULT);


?>



<h1>Novo Usuário</h1>

<form action="" method="post">

    <label for="name">Nome: </label><br>
    <input type="text" name="name" id="name" placeholder="Digite seu Nome!" value="<?php echo $name; ?>"> <br><br>

    <label for="email">E-mail: </label><br>
    <input type="text" name="email" id="email" placeholder="Digite o E-mail!" value="<?php echo $email; ?>"> <br><br>

    <label for="user">Senha: </label><br>
    <input type="password" name="password" id="password" placeholder="Digite a Senha!" value="<?php echo $password; ?>"> <br><br>

    <button type="submit">Acessar</button>

</form>

<p>Já tem uma conta<a href="<?php echo URLADM ?>login">Clique Aqui</a> para acessar.</p>