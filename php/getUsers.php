<?php
    session_start();
    include_once './config.php';
    $outgoing_id = $_SESSION['uniqueId'];
    $othersql = mysqli_query($conn, "SELECT * FROM users WHERE status = 'online' AND uniqueId <> $outgoing_id ORDER BY name, status DESC");
    $output = '';
    while ($row = mysqli_fetch_assoc($othersql)){ 
        $output .= ' <a href="./chat.php?id=' . $row['uniqueId'] . '">
                    <div class="user">
                        <img src="./images/'. $row["imgPath"]. '" alt="">
                        <div class="details">
                            <div class="username">' . $row['name'] . '</div>
                            <span class="message">This is a messsage</span>
                        </div>
                        <div class="status-dot ' . $row['status']. '">
                            <i class="bx bxs-circle"></i>
                        </div>
                    </div>
                </a>';
    }
    echo $output;
?>