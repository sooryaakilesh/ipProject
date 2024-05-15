<!DOCTYPE html>
<html>
    <head>
        <title>Admin login</title>
        <link rel="stylesheet" href="pages/login.css">
    </head>
    <body>
        <?php
            //getting username and password from login
            $user = $_POST['userName'];
            $pass = $_POST['password'];

            //connecting to the db
            $servername = "localhost";
            $username = "root";
            $password = "";
            $db = "serviceapartment";
            $conn = new mysqli($servername, $username, $password, $db);

            if($conn->connect_error) {
                die('error');
            }

            //if connection successfull
            echo "successfull";
        ?>
    <script>
        const retry = () => {
            window.open('./login.html');
        }
    </script>
</html>