<?php
    $servername = "localhost";
    $username = "root";
    $password = "password";

    //Create connection
    $conn = new mysqli($servername, $username, $password);

    //Check connection
    if($conn->connect_error)
    {
        $conn->close();
        die("Connection failed: " . $conn->connect_error);
    }
    echo "Connected successfully";
?>