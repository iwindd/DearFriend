<?php 
    include("./components/header.ini.php");
    require('./middlewares/LoginOnly.php');
?>


<?php
    if ($_SESSION['permission'] == 1){
        include "./components/users.ini.php";
    }


    echo $_SESSION['name'];
?>

<a href="edit_profile.php">แก้ไขโปรไฟล์</a>


<?php include("./components/footer.ini.php");?>