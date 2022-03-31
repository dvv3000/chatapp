<?php
    session_start();

    include_once './config.php';

    $email = $_POST['email'];
    $password = $_POST['password'];

    if(isset($email) && isset($password)){
        $sql = "SELECT uniqueId, email, password FROM users WHERE email = '$email'";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            // print_r($row);
            // die();
            $encrypt_pass = md5($password);
            if($encrypt_pass === $row['password']){
                $status = 'online';
                $setStatus = "UPDATE users SET status = '${status}' WHERE uniqueId = ${row['uniqueId']}";
                $resultSetStatus = mysqli_query($conn, $setStatus);

                if($resultSetStatus) {
                    $_SESSION['uniqueId'] = $row['uniqueId'];
                    echo "success";
                }
                else {
                    echo "Something went wrong, please try again later";
                }
            }
            else {
                echo "Password is incorrect";
            }
        }
        else {
            echo "Email is not existed";
        }
    }
?>
