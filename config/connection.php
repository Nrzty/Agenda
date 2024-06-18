<?php

    $host = "localhost";
    $dbname = "agenda";
    $user = "root";
    $password = "";

    try {
        // Conexão bem sucedida
        $connection = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
        // Ativar o modo  de erros
        $connection -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        // Erro na conexão
        $error = $e -> getMessage();
        echo "Erro: $error";
    }