<?php 

    session_start();

    if (!isset($_SESSION["autenticado"]) || $_SESSION["autenticado"] != "SIM") {
        header("Location: index.php?login=erro2");
    }

    $usuarios_cadastrados = [
        ["email" => "adm@teste.com.br", "senha" => "adm123"],
        ["email" => "user@teste.com.br", "senha" => "user123"]
    ];

    $usuario_autenticado = false;

    foreach ($usuarios_cadastrados as $user) {
        if($_POST["email"] == $user["email"] && $_POST["senha"] == $user["senha"] ) {
            $usuario_autenticado = true;
        }
    }

    if ($usuario_autenticado) {
        $_SESSION["autenticado"] = "SIM";
        header("Location: home.php");
    } else {
        $_SESSION["autenticado"] = "NÃO";
        header("Location: index.php?login=erro");
    }

?>