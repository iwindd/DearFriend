<?php
include("./components/header.ini.php");
require('./middlewares/NoLogin.php');
?>

<?php

if ($_POST) {
    $email      = $_POST["email"];
    $name       = $_POST["name"];
    $password   = $_POST["password"];

    if (strlen($_POST["password"]) <= 5) {
        echo "error password length <= 5";
    } else {
        $sql = "INSERT INTO users (email, name, password) VALUES ('$email', '$name', '$password')";

        if (mysqli_query($conn, $sql)) {
            header("location: login.php");
        }
    }
}

?>

<style>
    input {
        display: block;
        margin-top: 5px;
    }
</style>

<form method="POST">
    <input type="text" placeholder="email" name="email">
    <input type="text" placeholder="name" name="name">
    <input type="password" placeholder="password" name="password">

    <input type="submit" value="สมัคร">
</form>

<?php include("./components/footer.ini.php") ?>