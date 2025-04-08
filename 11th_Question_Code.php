<html>
    <head>
        <title>PHP & MYSQL</title>
    </head>

    <body>
        <form action="index.php" method="post">
            <p>Update By:
                <select name="Condition">
                    <option value="Name" selected>Name</option>
                    <option value="Email">Email</option>
                    <option value="Phone_Number">Phone Number</option>
                </select>
                <input type="text" name="Search">
            </p>
            <p>Name: <input type="text" name="Name"></p><br/>
            <p>Password: <input type="password" name="Password"></p><br/>
            <p>Email-ID: <input type="text" name="EMail"></p><br/>
            <p>Phone Number: <input type="text" name="mobno"></p><br/>
            <p>Gender: <input type="radio" name="Gender" value="Male"> Male <input type="radio" name="Gender" value="Female"> Female </p><br/>
            <p>Date of Birth: <input type="date" name="DOB" min="1990-01-01" max="2020-02-01"></p><br/>
            <p>Age: <input type="text" name="Age"></p><br/>
            <p>Languages: 
                <select name="lang">
                    <option lang="en" value="english" selected>English</option>
                    <option lang="fr" value="malayalam">Malyalam</option>
                    <option lang="it" value="hindi">Hindi</option>
                </select>
            </p><br/>

            <button type="submit">Submit</button>
        </form>

        <?php
            if($_SERVER["REQUEST_METHOD"] === "POST")
            {
                $Condition = $_POST["Condition"];
                $Search = $_POST["Search"];

                $Name = $_POST["Name"];
                $Pass = $_POST["Password"];
                $Email = $_POST["EMail"];
                $Phone_Number = $_POST["mobno"];
                $Gender = $_POST["Gender"];
                $DOB = $_POST["DOB"];
                $Age = $_POST["Age"];
                $Langs = $_POST["lang"];

                $USER = "root";
                $SERVER = "localhost";
                $PASS = "";
                $DB = "test";

                $conn = new mysqli($SERVER, $USER, $PASS, $DB);
                if($conn->connect_error)
                {
                    die("Connection Error!");
                }

                $SQL_Query = "UPDATE USERS SET NAME='$Name', PASSWORD='$Pass', EMAIL='$Email', PHONE_NUMBER='$Phone_Number', GENDER='$Gender', DOB='$DOB', AGE='$Age', LANGUAGE='$Langs' WHERE $Condition='$Search'";
                $result = $conn->query($SQL_Query);

                if($result == true)
                {
                    echo "<script>alert('Details Successfully updated data using mysql!')</script>";
                } else {
                    echo "<script>alert('Unsuccessful at updating data using mysql!')</script>";
                }
            }
        ?>
    </body>
</html>
