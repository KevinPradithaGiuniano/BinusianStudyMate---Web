<?php

$is_invalid = false;

if($_SERVER['REQUEST_METHOD'] === 'POST');

$mysqli = require __DIR__ . '/db_connection.php';

$sql = sprintf("SELECT * FROM user
                WHERE email = '%s'",
                $mysqli->real_escape_string($_POST['email']));

$result = $mysqli->query($sql);

$user = $result->fetch_assoc();

if($user){

    if (password_verify($_POST['password'], $user['password_hash'])){

        header("Location: home.html");

    }else{
        
        echo '<p class="error">Invalid email format</p>';

    }

    $is_invalid = true;

}

?>