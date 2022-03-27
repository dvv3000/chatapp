<?php
        const HOST = 'localhost';
        const USERNAME = 'root';
        const PASSWORD = '';
        const DB_NAME = 'chatapp';

        $conn = mysqli_connect(HOST, USERNAME, PASSWORD, DB_NAME);
        
        if(!$conn){
            echo "Database connection error".mysqli_connect_error();
          }


?>