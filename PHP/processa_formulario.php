<form action = "processa_formulario.php" method = "post">
    Nome: <input type = "text" name = "nome"><br>
    E-mail: <input type = "email" name ="email"><br>
    <input type = "submit" value = "Enviar">
</form>

<?php
$nome = $_POST['nome']; //pega o que foi escrito no campo "nome"
$email = $_POST['email']; //pega o que foi escrito co campo "email"
echo "Obrigado por me enviar, $nome! Seu e-mail e $email.";
?>

