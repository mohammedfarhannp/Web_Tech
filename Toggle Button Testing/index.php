
<?php
    session_start();
    if($_SERVER['REQUEST_METHOD'] === "POST")
    {
        $_SESSION['S1'] = isset($_POST['S1']) ? "ON" : "OFF";
    }

    $S1_State = isset($_SESSION['S1']) && $_SESSION['S1'] === "ON" ? "Checked" : ""; 
?>

<html>
    <head>
        <title>Toggle Button Test</title>
        <link rel="stylesheet" href="styles.css">
    </head>

    <body>

        <form method="POST">
        
            <label class="switch">
                <input type="checkbox" name="S1" value="ON" <?= $S1_State ?>>
                <span class="slider"></span>
            </label>
            <button type="submit">Update</button>
        </form>

        <?php
            if(isset($_SESSION['S1']) && $_SESSION['S1'] === "ON") {
                echo '<button type="button">Sem 1</button>';
            }
        ?>
    </body>
</html>