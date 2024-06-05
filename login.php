<?php
    session_start();
    include("config.php");
    include("database.php");
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Delta Courier | Admin</title>
        <link rel="stylesheet" href="/css/admin.css">
        <link rel="icon" type="image/x-icon" href="https://www.iekdeltalive.gr/images/favicon-32x32.png">
        <script src="/js/script.js"></script>
    </head>
    <body>
        <form action="login.php" method="post">
            <h3>Delta Courier</h3>
    
            <label for="username">Username</label>
            <input type="text" placeholder="Username" id="username" name="username">
    
            <label for="password">Password</label>
            <input type="password" placeholder="Password" id="password" name="password">
    
            <button id="submit" name="submit">Log In</button>
        </form>
        <?php
                if(isset($_POST['submit'])) {
                    $name = $_POST['username'];
                    $pass = $_POST['password'];

                    $query = "SELECT users_username,users_password FROM users";
                    $result = $conn->query($query);
                    $_SESSION["logged_in"] = true;

                    if ($result) {
                        if ($result->num_rows > 0) {
                            $row = $result->fetch_assoc();
                            if ($row['users_username'] == $name and $row['users_password'] == $pass){
                                header('Location: /admin.php');
                                exit;
                            }
                        }
                    }
                }
                            
        ?>
    </body>
</html>