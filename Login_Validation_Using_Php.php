<html>
    <head>
        <title>PHP LOGIN VALIDATION</title>
    </head>

    <body>
        <form action="index.php" method="post">
            <p>USERNAME : <input type="text" name="username"></p>
            <p>PASSWORD : <input type="password" name="password"></p>
            <button type="submit">Login</button>
        </form>

        <?php
            if($_SERVER["REQUEST_METHOD"] === "POST")
            {
                $SERVER = "localhost";
                $USER = "root";
                $PASS = "";
                $DB = "test";

                $conn = new mysqli($SERVER, $USER, $PASS, $DB);
                if($conn->connect_error)
                {
                    die("Connection  Error");
                }

                $username = $_POST["username"];
                $password = $_POST["password"];

                $Query = "SELECT * FROM CREDS WHERE USERNAME='$username' AND PASSWORD='$password'";
                $result = $conn->query($Query);
                if($result->num_rows == 1)
                {
                    echo "<script>alert('LOGIN SUCCESSFUL!')</script>";
                } else {
                    echo "<script>alert('LOGIN FAILED!')</script>";
                }
                
            }
        ?>
    </body>
</html>
