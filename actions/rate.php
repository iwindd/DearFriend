<?php require_once("../connect.ini.php")?>
<?php

if ($_POST){
    $selfId = $_SESSION['id'];
    $target   = $_POST['id'];
    $rate = $_POST['rate'];

    if ($rate == -1){
        mysqli_query($conn, "DELETE FROM rating WHERE rateBy = '$selfId' AND rateTo ='$target'");
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit();
    }

    $sql = "INSERT INTO rating (rateBy, rateTo, rate) VALUES ('$selfId', '$target', '$rate')";

    if (mysqli_query($conn, $sql)){
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }else{
        /* UPDATE METHOD */
        if (mysqli_query($conn, "UPDATE rating SET rate = '$rate' WHERE rateBy = '$selfId' AND rateTo = '$target'")){
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
    }
}


?>