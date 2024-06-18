<?php

    session_start();

    include_once("connection.php");
    include_once("url.php");

    $data = $_POST;
    
    // MODIFICAÇÕES NO BANCO
    if (!empty($data)) {
        print_r($data); 

        if ($data["type"] === "create") {
            
            $name = $data["name"];
            $phone = $data["phone"];
            $observations = $data["observations"];

            $query = "INSERT INTO contacts (name, phone, observations) VALUES (:name, :phone, :observations)";

            $stmt = $connection -> prepare($query);

            $stmt -> bindParam(":name", $name);
            $stmt -> bindParam(":phone", $phone);
            $stmt -> bindParam(":observations", $observations);

            try {
                $stmt -> execute();
                $_SESSION["msg"] = "Contato criado com sucesso";
            } catch (PDOException $e) {
                // Erro na conexão
                $error = $e -> getMessage();
                echo "Erro: $error";
            }

        } else if ($data["type"] === "edit") {
            
            $name = $data["name"];
            $phone = $data["phone"];
            $observations = $data["observations"];
            $id = $data["id"];

            $query = "UPDATE contacts 
                      SET name = :name, phone = :phone, observations = :observations 
                      WHERE id = :id";

            $stmt = $connection -> prepare($query);

            $stmt -> bindParam(":name", $name);
            $stmt -> bindParam(":phone", $phone);
            $stmt -> bindParam(":observations", $observations);
            $stmt -> bindParam(":id", $id);

            try {
                $stmt -> execute();
                $_SESSION["msg"] = "Contato Atualizado com Sucesso!";
            } catch (PDOException $e) {
                // Erro na conexão
                $error = $e -> getMessage();
                echo "Erro: $error";
            }
        
        } else if ($data["type"] === "delete") {
            
            $id = $data["id"];
            
            $query = "DELETE FROM contacts WHERE id = :id";

            $stmt = $connection -> prepare($query);

            $stmt -> bindParam(":id", $id);

            $stmt -> execute();

            try {
                $stmt -> execute();
                $_SESSION["msg"] = "Contato deletado com Sucesso!";
            } catch (PDOException $e) {
                // Erro na conexão
                $error = $e -> getMessage();
                echo "Erro: $error";
            }

        }
             
        // Redirect Home
        header("Location: " . $BASE_URL . "../index.php");

    // SELEÇÃO DE DADOS
    } else {
        
        $id;
        if (!empty($_GET)) {
            $id = $_GET["id"];
        }

        // Retorna apenas um contato
        if (!empty($id)) {

            $query = "SELECT * FROM contacts WHERE id = :id";

            $stmt = $connection -> prepare($query);

            $stmt -> bindParam(":id", $id);

            $stmt -> execute();

            $contact = $stmt -> fetch();

        } else {
            // Retorna todos os contatos
            $contacts = [];

            $query = "SELECT * FROM contacts";

            $stmt = $connection -> prepare($query);

            $stmt -> execute();

            $contacts = $stmt -> fetchAll();
        }   
    }

    // FECHAR CONEXÃO COM PDO
    $connection = null;