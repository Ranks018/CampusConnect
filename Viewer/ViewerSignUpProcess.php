<?php

if (empty($_POST["ViewerFirstName"])) {
    die("Name is required");
}
if (empty($_POST["ViewerLastName"])) {
    die("Name is required");
}

if ( ! filter_var($_POST["ViewerEmail"], FILTER_VALIDATE_EMAIL)) {
    die("Valid email is required");
}

if (strlen($_POST["ViewerPassword"]) < 8) {
    die("Password must be at least 8 characters");
}

if ( ! preg_match("/[a-z]/i", $_POST["ViewerPassword"])) {
    die("Password must contain at least one letter");
}

if ( ! preg_match("/[0-9]/", $_POST["ViewerPassword"])) {
    die("Password must contain at least one number");
}

if ($_POST["ViewerPassword"] !== $_POST["ViewerConfirmPassword"]) {
    die("Passwords must match");
}

$password_hash = password_hash($_POST["ViewerPassword"], PASSWORD_DEFAULT);

$activation_token = bin2hex(random_bytes(16));

$activation_token_hash = hash("sha256", $activation_token);

$conn = require __DIR__ . "/../DatabaseConnection.php"; 
if (!$conn) {
    die("Database connection failed.");
}

$sql = "INSERT INTO viewer (ViewerFirstName, ViewerLastName, ViewerEmail, ViewerPassword, account_activation_hash)
        VALUES (?, ?, ?, ?, ?)";
        
$stmt = $conn->stmt_init();

if ( ! $stmt->prepare($sql)) {
    die("SQL error: " . $conn->error);
}

$stmt->bind_param("sssss",
                  $_POST["ViewerFirstName"],
                  $_POST["ViewerLastName"],
                  $_POST["ViewerEmail"],
                  $password_hash,
                  $activation_token_hash);
                  
if ($stmt->execute()) {

    $mail = require __DIR__ . "/../Public/Mailer.php";
    if (!$mail) {
        die("Mailer configuration failed.");
    }

    $mail->setFrom("noreply@example.com");
    $mail->addAddress($_POST["ViewerEmail"]);
    $mail->Subject = "Account Activation";
    $mail->Body = <<<END

    Click <a href="https://3b3c-105-245-112-229.ngrok-free.app/Online%20News%20Portal/Viewer/ViewerHomepage.php?token=$activation_token">here</a> 
    to activate your account.

    END;

    try {

        $mail->send();

    } catch (Exception $e) {

        echo "Message could not be sent. Mailer error: {$mail->ErrorInfo}";
        exit;

    }

    header("Location: ViewerSignUpSuccess.php");
    exit;
    
} else {
    
    if ($conn->errno === 1062) {
        die("email already taken");
    } else {
        die($conn->error . " " . $conn->errno);
    }
}







