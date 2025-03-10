<?php 
$name = '';
$email = '';
$password = '';
var_dump($this->data['form']);
if (isset($this->data['form'])) {
    $valForm = $this->data['form'];

    $name = $valForm['name'];
    $email = $valForm['email'];
    $password = $valForm['password'];
}

// echo password_hash("123456a", PASSWORD_DEFAULT);


?>



<h1>Novo Usuário</h1>

<div id="msg"></div>

<form action="" method="post" data-form="form">

    <label for="name">Nome: </label><br>
    <input type="text" name="name" id="name" placeholder="Digite seu Nome!" value="<?php echo $name; ?>" data-field="field_verified"> <br><br>

    <label for="email">E-mail: </label><br>
    <input type="text" name="email" id="email" placeholder="Digite o E-mail!" value="<?php echo $email; ?>" data-field="field_verified"> <br><br>

    <label for="password">Senha: </label><br>
    <input type="password" name="password" id="password" placeholder="Digite a Senha!" value="<?php echo $password; ?>" data-field="field_verified"> <br><br>

    <button type="submit">Acessar</button>

</form>

<p>Já tem uma conta<a href="<?php echo URLADM ?>login">Clique Aqui</a> para acessar.</p>