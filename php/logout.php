<?php
    session_start();
    include_once './config.php';

    if(!isset($_SESSION['uniqueId'])){
        header('Location: ../login.php');
    }
    $uniqueId = $_SESSION['uniqueId'];
    $status = 'offline';
    $query = "UPDATE users SET status = '{$status}' WHERE uniqueId = {$uniqueId}";

    $sql = mysqli_query($conn, $query);

    if($sql) {
        unset($_SESSION['uniqueId']);
        session_destroy();
        header('Location: ../login.php');
    }
    else{
        header('Location: ../users.php');

    }
?>