<?php include("./components/header.ini.php"); ?>

<?php
if ($_POST) {
    $userId = $_SESSION['id'];
    $name = $_POST['name'];

    $sql = "UPDATE users SET name = '$name' WHERE id = '$userId'";
    
    if (mysqli_query($conn, $sql)){
        $_SESSION['name'] = $name;

        header("location: index.php");
    }else{
        echo "ERROR : ".mysqli_error($conn);
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
    <input type="text" placeholder="email" disabled value="<?= $_SESSION['email'] ?>" name="email">
    <input type="text" placeholder="name" value="<?= $_SESSION['name'] ?>" name="name">

    <input type="submit" value="บันทึก">
    <a href="index.php">ย้อนกลับ</a>
</form>

<?php include("./components/footer.ini.php") ?>