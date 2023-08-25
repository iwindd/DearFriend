<?php
include("./components/header.ini.php");
?>

<?php
if ($_POST) {
    $userId = $_POST['userId'];
    $email = $_POST['email'];
    $name = $_POST['name'];
    $password = $_POST['password'];
    $permission = $_POST['permission'];

    $sql = "UPDATE users SET email = '$email', name = '$name', password = '$password', permission = '$permission' WHERE id = '$userId'";
    
    if (mysqli_query($conn, $sql)){
        header("location: index.php");
    }else{
        echo "ERROR : ".mysqli_error($conn);
    }
}
?>

<?php
    $userId = $_GET['id'];
    $sql = "SELECT * FROM users WHERE id = '$userId' ";
    $result = mysqli_query($conn, $sql);

    $email = "";
    $password = "";
    $name = "";

    if (mysqli_num_rows($result) > 0) {
        $data = mysqli_fetch_assoc($result);

        $email = $data['email'];
        $password = $data['password'];
        $name = $data['name'];
    } else {
        echo "NOT FOUND USER";

        exit();
    }
?>


<style>
    input {
        display: block;
        margin-top: 5px;
    }
</style>

<form method="POST">
    <input type="text" placeholder="email" value="<?= $email ?>" name="email">
    <input type="text" placeholder="name" value="<?= $name ?>" name="name">
    <input type="text" placeholder="password" value="<?= $password ?>" name="password">
    <input type="hidden" value="<?= $userId?>" name="userId">

    <select name="permission">
        <option value="0">ผู้ใช้ปกติ</option>
        <option value="1">แอดมิน</option>
    </select>

    <input type="submit" value="แก้ไข">
    <a href="index.php">ย้อนกลับ</a>
</form>

<?php include("./components/footer.ini.php") ?>
