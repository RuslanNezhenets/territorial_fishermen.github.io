<?php
    if (isset($_POST["ID"]) && isset($_POST["Name"]) && isset($_POST["Surname"])){

        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: GET,HEAD,OPTIONS,POST,PUT");
        header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Authorization");

        $id = $_POST["ID"];
        $name = $_POST["Name"];
        $surname = $_POST["Surname"];

        try {
            $conn = new PDO("mysql:host=localhost;  dbname=territorial_fishermen", "Ruslan", "123456");
            $sql = "UPDATE people
            SET people.PersonName = '".$name."', people.SurName = '".$surname."'
            WHERE people.ID = $id;";

            $conn->exec($sql);

            print "<h3>Редактирование успешно завершено<h3>";

        }
        catch (PDOException $e) {
            echo "Database error: " . $e->getMessage();
        }
    }
?>