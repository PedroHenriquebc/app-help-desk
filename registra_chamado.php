<?php

    //trabalhando na montagem do texto
    $titulo = str_replace("#", "-", $_POST["titulo"]);
    $categoria = str_replace("#", "-", $_POST["categoria"]);
    $descricao = str_replace("#", "-", $_POST["descricao"]);

    $texto = $titulo . "#" . $categoria . "#" . $descricao . PHP_EOL;

    //abrindo arquivo
    $arquivo = fopen("arquivo.txt", "a");

    //escrevendo o texto
    fwrite($arquivo, $texto);

    //fechando o arquivo
    fclose($arquivo);

    //redirecionando para abrir_chamado.php
    header("Location: abrir_chamado.php");

?>