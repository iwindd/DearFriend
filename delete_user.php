<?php include("./components/header.ini.php")?>

<?php

    $id = $_GET['id'];
    $sql = "DELETE FROM users WHERE id = '$id'";

    if (mysqli_query($conn, $sql)){
        header("location: index.php");
    }else{
        echo "not success".mysqli_error($conn);
    }

?>

<?php include("./components/footer.ini.php")?>