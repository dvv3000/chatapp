<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <div class="main">

            <h2 class="title">Chat Application</h2>

            <div class="form-name">
                <h3 class="register"> Login </h3>
            </div>

            <div class="error-mess"></div>
            <form action="" method="post" class="form form-fields">

                    <div class="form-field">
                        <label for="email">Email</label>
                        <input type="text" placeholder="Enter your email" name="email" class="form-control email">
                    </div>


                    <div class="form-field">
                        <label for="password">Password</label>
                        <input type="password" class="form-control password" name="password" placeholder="Enter your password">
                    </div>

                <div class="link">Create new account? <a href="./register.php">Register here</a></div>

                <button type="submit" class="form-submit">Submit</button>
            </form>
    </div>
    <script src="./javascript/login.js"></script>
</body>
</html>