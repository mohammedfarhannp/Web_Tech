<html>
    <head>
        <title>PHP & MYSQL</title>
    </head>

    <body>
        <?php

            $USER = "root";
            $SERVER = "localhost";
            $PASS = "";
            $DB = "test";

            $conn = new mysqli($SERVER, $USER, $PASS, $DB);
            if($conn->connect_error)
            {
                die("Connection Error!");
            }
            
            if($_SERVER["REQUEST_METHOD"] === "POST")
            {
                $Condition = $_POST["condition"];
                $delete = $_POST["Del"];

                $Query = "DELETE FROM USERS WHERE $Condition='$delete'";
                $Result = $conn->query($Query);
                if($Result == true)
                {
                    echo "<h2>Row Deleted...</h2>";
                }

            }

            $SQL_Query = "SELECT * FROM USERS";
            $Results = $conn->query($SQL_Query);
            
            echo "<h1>MySQL Table - USERS</h1>";

            echo "<table border='1'>";
            echo "<tr>
                <th>Name</th>
                <th>Age</th>
                <th>Phone Number</th>
                <th>Email</th>
                <th>Language</th>
            </tr>";

            while($row=$Results->fetch_assoc())
            {
                echo "<tr>
                    <td> " . $row['NAME'] . "</td>
                    <td> " . $row['AGE'] . "</td>
                    <td> " . $row['PHONE_NUMBER'] . "</td>
                    <td> " . $row['EMAIL'] . "</td>
                    <td> " . $row['LANGUAGE'] . "</td>
                </tr>";
            }
            
            echo "</table>";
        ?>

        <form action="index.php" method="post">
            <p>Delete By <select name="condition">
                <option value="NAME" selected>Name</option>
                <option value="PHONE_NUMBER">Phone Number</option>
                <option value="EMAIL">Email</option>
                <option value="LANGUAGE">Language</option>
            </select></p>
            <input type="text" name="Del">
            <button type="submit">Delete Row</button>
        </form>
    </body>
</html>