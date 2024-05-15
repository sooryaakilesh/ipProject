<!DOCTYPE html>
<html>
    <head>
        <title>Login form test</title>
    </head>
    <body>
<?php
    //get new user name and password
    $user = $_POST['userName'];
    $pass = $_POST['password'];
    $option = $_POST['option'];

    //connecting to the db
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db = "serviceapartment";
    $conn = new mysqli($servername, $username, $password, $db);

    if($conn->connect_error) 
        die('error');

    //if connection successfull
    if($option == "admin") {
        $sql = "INSERT INTO adminlist(userName, password) VALUES ('$user', '$pass')";
        $result = $conn->query($sql);
        header("Location: ../index.html");
    } else {
        $sql = "INSERT INTO userlist(userName, password) VALUES ('$user', '$pass')";
        $result = $conn->query($sql);
        header("Location: ../index.html");
    }
?>