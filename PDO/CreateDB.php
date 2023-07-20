<?php
    $servername = "localhost";
    $username = "root";
    $password = "password";

    try
    {
        $conn = new PDO("mysql:host=$servername",
    $username, $password);
    //Set the PDO error mode to exception
    $conn->setAttribute(
        PDO::ATTR_ERRMODE,
        PDO::ERRMODE_EXCEPTION
    );
    $sql = "CREATE DATABASE myDBPDO";
    //Use exec() because no results are returned
    $conn->exec($sql);
    echo "Database created succesfully<br>";
    } catch(PDOException $e)
    {
        $conn = null;
        echo $sql . "<br>" . $e->getMessage();
    }
    
    $conn = null;
?>