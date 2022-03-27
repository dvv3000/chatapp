<?php
    session_start();
    include_once './php/config.php';
    if (!isset($_SESSION['uniqueId'])){
        header('Location: ./login.php');
    }

    $usersql = mysqli_query($conn, "SELECT * FROM users WHERE uniqueId = {$_SESSION['uniqueId']}");
    if(mysqli_num_rows($usersql) === 1) {
        $user = mysqli_fetch_assoc($usersql);
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <div class="main">
            <header>
                <img src=<?php echo ("\"./images/" . "{$user['imgPath']} \""); ?> alt="">
                <div class="details">
                    <div class="username"><?php echo $user['name'];?></div>
                    <span class="status">
                        <?php
                            $result = $user['status'] === '1' ? 'Online' : 'Offline';
                            echo ($result);
                        ?>
                    </span>
                </div>
        
                <a href="#" class="logout">Logout</a>
            </header>
    
            <div class="search">
                <!-- <label for="search-txt">Search</label> -->
                <input type="text" placeholder="Enter user name" class="search-txt" name="search-txt">
                <i class='bx bx-search btn'></i>
            </div>
    
            <div class="user-list">

            </div>           
  
    </div>

    <script src="./javascript/users.js"></script>
</body>
</html>