<!DOCTYPE html>
<html>
    <head>
        <title>Login form test</title>
    </head>
    <body>
    <?php
        //get user name and password from login page
        $user = $_POST['userName'];
        $pass = $_POST['password'];

        //connect with db
        $servername = "localhost";
        $username = "root";
        $password = "";
        $db = "serviceapartment";
        $conn = new mysqli($servername, $username, $password, $db);

        //if connection error
        if($conn->connect_error) die("Connection failed: " . $conn->connect_error);

        //if connection successfull
        $sql = "SELECT userName, password FROM adminlist";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            $isAdmin = false;
            //checking if the user is admin or not
            while($row = $result->fetch_assoc()) {
                if($row["userName"] == $user && $row["password"] == $pass) {
                    $isAdmin = true;
                    break;
                }
            }

            //not an admin
            if (!$isAdmin) {
                echo "You are not an admin ";
                echo '<button onclick="retry()">Retry</button>';
            }

            //if the user is admin
            if ($isAdmin) {
                header("Location: adminPanel.html");
            }

        } else {
            echo "0 results";
        }

        $conn->close();
        ?>

    </body>
    <script>
        const retry = () => {
            window.open('./login.html');
        }
    </script>
</html>