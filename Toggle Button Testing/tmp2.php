<?php
session_start();

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $_SESSION['toggle'] = isset($_POST['toggle']) ? "on" : "off";
}

// Set initial toggle state
$toggleState = isset($_SESSION['toggle']) && $_SESSION['toggle'] == "on" ? "checked" : "";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Persistent Toggle Button</title>
    <style>
        .switch {
            position: relative;
            display: inline-block;
            width: 50px;
            height: 25px;
        }
        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }
        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            transition: .4s;
            border-radius: 25px;
        }
        .slider:before {
            position: absolute;
            content: "";
            height: 18px;
            width: 18px;
            left: 4px;
            bottom: 3px;
            background-color: white;
            transition: .4s;
            border-radius: 50%;
        }
        input:checked + .slider {
            background-color: #2196F3;
        }
        input:checked + .slider:before {
            transform: translateX(25px);
        }
    </style>
</head>
<body>

<form method="POST">
    <label class="switch">
        <input type="checkbox" name="toggle" value="on" <?= $toggleState ?>>
        <span class="slider"></span>
    </label>
    <button type="submit">Submit</button>
</form>

<?php
if (isset($_SESSION['toggle'])) {
    echo "<p>Toggle is <strong>" . strtoupper($_SESSION['toggle']) . "</strong></p>";
}
?>

</body>
</html>
