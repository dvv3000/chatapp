<?php 
    session_start();
    if(!isset($_SESSION['uniqueId'])){
        header('Location: ./login.php');
    }
    include_once './php/config.php';
    $uniqueId = $_GET['id'];

    $sql = mysqli_query($conn, "SELECT * FROM users WHERE uniqueId = {$uniqueId}");
    if(mysqli_num_rows($sql) === 1){
        $row = mysqli_fetch_assoc($sql);
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
        <section class="chat-area">
            <header>
                <a href="./users.php" class="back-icon">
                    <i class='bx bx-chevron-left'></i>
                </a>
                <img src="<?php echo ('./images/'. $row['imgPath']); ?>" alt="">
                <div class="details">
                    <div class="username"><?php echo $row['name']; ?></div>
                    <span class="status"><?php echo $row['status']; ?></span>                  
                </div>
            </header>
            <div class="chat-box">
                
            </div>
            <form action="" class="message">
            <input type="text" class="incoming_id" name="incomingId" value="<?php echo $uniqueId; ?>" hidden>
                <input type="text" placeholder="Type a message here..." class="typing-area" name="content">
                <button>
                    <i class='bx bxs-send'></i>
                </button>
            </form>
        </section>

    </div>

    <script src="javascript/chat.js"></script>

</body>
</html>