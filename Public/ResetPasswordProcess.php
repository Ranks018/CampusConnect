<?php

$token = $_POST["token"];

$token_hash = hash("sha256", $token);

$conn = require __DIR__ . "/DatabaseConnection.php";

$sql = "SELECT * FROM viewer
        WHERE reset_token_hash = ?";

$stmt = $conn->prepare($sql);

$stmt->bind_param("s", $token_hash);

$stmt->execute();

$result = $stmt->get_result();

$viewer = $result->fetch_assoc();

if ($viewer === null) {
    die("token not found");
}

if (strtotime($viewer["reset_token_expires_at"]) <= time()) {
    die("token has expired");
}

if (strlen($_POST["password"]) < 8) {
    die("Password must be at least 8 characters");
}

if ( ! preg_match("/[a-z]/i", $_POST["password"])) {
    die("Password must contain at least one letter");
}

if ( ! preg_match("/[0-9]/", $_POST["password"])) {
    die("Password must contain at least one number");
}

if ($_POST["password"] !== $_POST["password_confirmation"]) {
    die("Passwords must match");
}

$password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);

$sql = "UPDATE viewer
        SET ViewerPassword = ?,
            reset_token_hash = NULL,
            reset_token_expires_at = NULL
        WHERE ViewerId = ?";

$stmt = $conn->prepare($sql);

$stmt->bind_param("ss", $password_hash, $viewer["ViewerId"]);

$stmt->execute();

echo "Password updated. You can now login.";