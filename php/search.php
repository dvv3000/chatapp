<?php
    session_start();
    include_once './config.php';

    $searchTxt =  $_GET['searchText'];
    $output = '';

    $sql = mysqli_query($conn, "SELECT  * FROM users WHERE name LIKE '%{$searchTxt}%' AND uniqueId <> {$_SESSION['uniqueId']}");
    if(mysqli_num_rows($sql) === 0) {
        $output .= 'No result';
    }
    else {
        while($row = mysqli_fetch_assoc($sql)) {
            $output .= ' <a href="./chat.php?id=' . $row['id'] . '">
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
    }
    echo $output;
?>