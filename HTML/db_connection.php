<?php
$host = "localhost:3307";
$dbname = "binusianstudymate";
$username = "root";
$password = "";


// Create a connection to the database
$mysqli = new mysqli(hostname: $host, 
                     username: $username,
                     password: $password, 
                     database: $dbname);

// Check the connection
if ($mysqli->connect_errno) {
    die("Connection error: " . $mysqli->connect_error);
}

return $mysqli;