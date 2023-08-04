<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'password');
define('DB_NAME', 'demo');
 
/* Attempt to connect to MySQL database */
try
{
    $pdo = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

     //Sql to create table
    $sql = "CREATE TABLE IF NOT EXISTS users (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
    PRIMARY KEY (`id`)
    )";
  
    //Use exec() because no results are returned
    $pdo->exec($sql);

    $sql = "CREATE TABLE IF NOT EXISTS password_reset_request (
        id int(10) unsigned NOT NULL AUTO_INCREMENT,
        user_id int(10) unsigned NOT NULL,
        date_requested datetime NOT NULL,
        token varchar(255) COLLATE utf8_unicode_ci NOT NULL,
        PRIMARY KEY (id)
      )";

    $pdo->exec($sql);

} 
catch(PDOException $e) 
{
    die("ERROR: Could not connect. " . $e->getMessage());
}
?>