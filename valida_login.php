<?php 

    session_start();

    if (!isset($_SESSION["autenticado"]) || $_SESSION["autenticado"] != "SIM") {
        header("Location: index.php?login=erro2");
    }

    $usuario_autenticado = false;
    $usuario_id = null;
    $usuario_perfil_id = null;

    $perfis = [1 => "Administrativo", 2 => "Usuário"];

    $usuarios_cadastrados = [
        ["id" => 1, "email" => "adm@teste.com.br", "senha" => "1234", "perfil_id" => 1],
        ["id" => 2, "email" => "user@teste.com.br", "senha" => "1234", "perfil_id" => 1],
        ["id" => 3, "email" => "jose@teste.com.br", "senha" => "1234", "perfil_id" => 2],
        ["id" => 4, "email" => "maria@teste.com.br", "senha" => "1234", "perfil_id" => 2]
    ];


    foreach ($usuarios_cadastrados as $user) {
        if($_POST["email"] == $user["email"] && $_POST["senha"] == $user["senha"] ) {
            $usuario_autenticado = true;
            $usuario_id = $user["id"];
            $usuario_perfil_id = $user["perfil_id"];
        }
    }

    if ($usuario_autenticado) {
        $_SESSION["autenticado"] = "SIM";
        $_SESSION["id"] = $usuario_id;
        $_SESSION["perfil_id"] = $usuario_perfil_id;
        header("Location: home.php");
    } else {
        $_SESSION["autenticado"] = "NÃO";
        header("Location: index.php?login=erro");
    }

?>