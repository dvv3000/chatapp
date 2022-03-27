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
                <h3 class="register"> Register </h3>
            </div>

            <div class="error-mess"></div>
            <form action="" method="POST" enctype="multipart/form-data" class="form-fields" id="form">
                <div class="form-field">
                    <label for="email">Email</label>
                    <input type="text" placeholder="Enter your email" name="email" class="form-control email" required>
                </div>

                <div class="form-field">
                    <label for="name">Name</label>
                    <input type="text" placeholder="Enter your name" class="form-control name" name="name" required>
                </div>

                <div class="form-field">
                    <label for="password">Password</label>
                    <input type="password" class="form-control password" name="password" placeholder="Enter your password" required>
                </div>

                <div class="form-field">
                    <label for="cf-password">Confirm Password</label>
                    <input type="password" class="form-control cf-password" name="cf-password" placeholder="Confirm your passord" required> 
                </div>

                <div class="form-field">
                    <label for="avatar">Avatar Picture</label>
                    <input type="file" name="file" class="image-file">
                </div>
                <div class="link">Already registered? <a href="./login.php">Login here</a></div>

                <button type="submit" name="submit" class="form-submit">Submit</button>
            </form>
    </div>
    <script src="./javascript/register.js"></script>
</body>
</html>