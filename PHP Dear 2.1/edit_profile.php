<?php include("./components/header.ini.php"); ?>

<?php
if ($_POST) {
    $userId = $_SESSION['id'];
    $name = $_POST['name'];
    $image = $_FILES['image'];
    $_image = $_SESSION['image'];

    unlink("images/$_image");
    
    $dir       = "images/";
    $imageName = uniqid() . '_' . mt_rand(1000, 9999);
    $imageExtens = pathinfo($image['name'], PATHINFO_EXTENSION);
    $imageFullname = $imageName . "." . $imageExtens;

    if (move_uploaded_file($image["tmp_name"], $dir . $imageFullname)){
        $sql = "UPDATE users SET name = '$name', image = '$imageFullname' WHERE id = '$userId'";
    
        if (mysqli_query($conn, $sql)){
            $_SESSION['name'] = $name;
            $_SESSION['image'] = $imageFullname;
    
            header("location: index.php");
        }else{
            echo "ERROR : ".mysqli_error($conn);
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

<form method="POST" enctype="multipart/form-data">
    
    <img src="images/<?=$_SESSION['image']?>">
    <input type="file" name="image">

    <input type="text" placeholder="email" disabled value="<?= $_SESSION['email'] ?>" name="email">
    <input type="text" placeholder="name" value="<?= $_SESSION['name'] ?>" name="name">

    <input type="submit" value="บันทึก">
    <a href="index.php">ย้อนกลับ</a>
</form>

<?php include("./components/footer.ini.php") ?>