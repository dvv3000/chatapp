<?php
    session_start();
    include_once 'config.php';

    if (!isset($_SESSION['uniqueId'])){
        header ('location: ../login.php');
    }

    $outgoingId = $_SESSION['uniqueId'];
    $incomingId = $_GET['incomingId'];
    $output = ''; 

    $query = "SELECT messages.id, messages.outgoingId, messages.incomingId, messages.content, users.imgPath FROM messages
                JOIN users ON messages.outgoingId = users.uniqueId 
                WHERE outgoingId = {$outgoingId} AND incomingId = {$incomingId}
                OR  outgoingId = {$incomingId} AND incomingId = {$outgoingId} ORDER BY messages.id ";

    $sql = mysqli_query($conn, $query);

    if(mysqli_num_rows($sql) > 0) {
        while($row = mysqli_fetch_assoc($sql)){
            if($row['outgoingId'] === $outgoingId){
                $output .= '<div class="chat outgoing">
                                <div class="text">
                                    <p>' . $row["content"] . '</p>
                                </div>
                            </div>';
            }
            else {
                $output .= '<div class="chat incoming">
                                <img src="./images/'.$row['imgPath'].'" alt="">
                                <div class="text">
                                    <p>' . $row["content"] . '</p>
                                </div>
                            </div>';   
            }
        }
    }
    else {
        $output = "<p>First message will appear here.</p>";
    }

    echo $output;
?>