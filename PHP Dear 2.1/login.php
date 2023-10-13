<?php 
    include("./components/header.ini.php");
    require('./middlewares/NoLogin.php');
?>

<?php
    if ($_POST){
        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) > 0){
            $data = mysqli_fetch_assoc($result);

            $_SESSION['id'] = $data['id'];
            $_SESSION['email'] = $data['email'];
            $_SESSION['name'] = $data['name'];
            $_SESSION['permission'] = $data['permission'];
            $_SESSION['image'] = $data['image'];

            header("location: index.php");
        }else{
            echo "NOT FOUND";
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
    <input type="text" placeholder="password" name="password">

    <input type="submit" value="เข้าสู่ระบบ">
</form>

<?php include("./components/footer.ini.php")?>