<?php
    session_start();
    include_once './config.php';
    if(!isset($_SESSION['uniqueId'])){
        header("location: ../login.php");
    }

    $outgoingId = $_SESSION['uniqueId'];
    $incomingId = $_POST['incomingId'];
    $content = $_POST['content'];
    if(!empty($content)){
        $sql = mysqli_query($conn, "INSERT INTO messages (outgoingId, incomingId, content) 
                                    VALUES ($outgoingId, $incomingId, '{$content}')");
    }
    echo $sql;
?> 