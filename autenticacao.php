<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['usuario']) && isset($_POST['senha'])) {
        $user = $_POST['usuario'];
        $password = $_POST['senha'];

        $host = 'localhost';
        $db_user = 'root';
        $db_pass = '';
        $db_name = 'login-page';

        $con = mysqli_connect($host, $db_user, $db_pass, $db_name);

        if (!$con) {
            die("Erro de conexão: " . mysqli_connect_error());
        }

        $sql = "SELECT * FROM logins WHERE usuario = ? AND senha = ?";

        if ($stmt = mysqli_prepare($con, $sql)) {
            mysqli_stmt_bind_param($stmt, "ss", $user, $password);

            mysqli_stmt_execute($stmt);

            $result = mysqli_stmt_get_result($stmt);

            if (mysqli_num_rows($result) > 0) {
                echo "Login feito com sucesso!";
            } else {
                echo "Erro ao fazer login. Usuário ou senha inválidos.";
            }

            mysqli_stmt_close($stmt);
        } else {
            echo "Erro na preparação da consulta.";
        }

        mysqli_close($con);
    } else {
        echo "Por favor, preencha os campos de usuário e senha.";
    }
}

?>
