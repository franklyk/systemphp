<?php 
$user = '';
$password = '';

if (isset($this->data['form'])) {
    $valForm = $this->data['form'];
    $user = $valForm['user'];
    $password = $valForm['password'];
}

// echo password_hash("123456a", PASSWORD_DEFAULT);

if (isset($_SESSION['msg'])) {
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
}

?>



<h1>Área Restrita</h1>
<form action="" method="post">

    <label for="user">Usuário: </label>
    <input type="text" name="user" id="user" placeholder="Digite o Usuário!" value="<?php echo $user; ?>"> <br><br>

    <label for="user">Senha: </label>
    <input type="password" name="password" id="password" placeholder="Digite a Senha!" value="<?php echo $password; ?>"> <br><br>

    <button type="submit">Acessar</button>

</form>