<?php
    session_start();

    include_once './config.php';

    // die (implode('---', $_POST));
    // Cac truong email, name, file da dc validate ben phia client 
    $email = $_POST['email'];
    $name =  $_POST['name'];
    $password = $_POST['password'];

    $file = $_FILES["file"];

    function checkExistedEmail($conn, $email) {
        $sql = "SELECT email FROM users where email = '$email'";
        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) == 0) {
            return "success";
        }
        return "Email is existed";
    }

    function createUser($conn, $email, $name, $password, $file) {
        if(isset($file)){
            $imgName = $file["name"];
            $tempName = $file["tmp_name"];

            $time = time();
            $newImgName = $time.$imgName;

            if(move_uploaded_file($tempName, '../images/'.$newImgName)) {
                $randId = rand(time(), 1000000);
                $encrypt_pass = md5($password);
                $status = 1;
                $insert = "INSERT INTO users (uniqueId, email, name, password, imgPath, status) 
                            VALUES ($randId, '${email}', '${name}', '${encrypt_pass}', '${newImgName}', $status)";
                // die($insert);

                $insertResult = mysqli_query($conn, $insert);

                if($insertResult) {
                    $select = "SELECT * FROM users WHERE email = '${email}'";
                    $selectResult = mysqli_query($conn, $select);
                    if (mysqli_num_rows($selectResult) === 1) {
                        $row = mysqli_fetch_assoc($selectResult);
                        $_SESSION['uniqueID'] = $row['uniqueId'];
                        return "success";
                    }
                    else{
                        return "Something went wrong, please try again";
                    }
                }else {
                    return "Insert data failed";
                }
            }
            else{
                return "Save image failed!";
            }
        }
    }
    $emailMess = checkExistedEmail($conn, $email);
    
    if ($emailMess === 'success') {
        
        $userMess = createUser($conn, $email, $name, $password, $file);
        echo $userMess;
    }
    else {
        echo $emailMess;
    }

?>