<?php

if( ! filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) ){
    die('Valid email is required');
}

if (strlen ($_POST['password']) < 8){
    die('Password must be atleast 8 characters long');
}

if ( ! preg_match('/[a-z]/i', $_POST['password'])){
    die('Password must contain at least 1 letter');
}if ( ! preg_match('/[0-9]/i', $_POST['password'])){
    die('Password must contain at least 1 letter');
}

if ($_POST['password'] !== $_POST['confirm-password']){
    die('Password must match');
};

$password_hash = password_hash($_POST['password'], PASSWORD_DEFAULT);

$mysqli = require __DIR__ . "/db_connection.php";

$sql = 'INSERT INTO user (email, password_hash)
        VALUES (?, ?)';

$stmt = $mysqli->stmt_init();

if ( ! $stmt->prepare($sql)){
    die('SQL error: ' . $mysqli->error);
}

$stmt->bind_param('ss',
                  $_POST['email'],
                  $password_hash);

if ($stmt->execute()){
    
    //echo 'Signup sucessful';
    header('Location: first-time-profile.html');
    exit;

}else{

    if ($mysqli->errno === 1062){
        die('email already taken');
    }else{
        die($mysqli->error . ' ' . $mysqli->errno);
    }

}