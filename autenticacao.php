<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = $_POST['usuario'];
    $password = $_POST['senha'];


    echo "Usuário: " . $user . "<br>";
    echo "Senha: " . $password . "<br>";


    $hashed_password = password_hash($password, PASSWORD_DEFAULT);


    $host = 'localhost';
    $user_db = 'root'; 
    $pass = '1504'; 
    $bank = 'login-page';  

    $con = mysqli_connect($host, $user_db, $pass, $bank);

    if (!$con) {
        die ("Erro de conexão: " . mysqli_connect_error());
    }

   
    $sql = "INSERT INTO logins (usuario, senha) VALUES ('$user', '$hashed_password')";

    if (mysqli_query($con, $sql)) {
        echo "Usuário registrado com sucesso!";
    } else {
        echo "Erro ao registrar o usuário: " . mysqli_error($con);
    }

    
    mysqli_close($con);
}
?>
