<?php

if (!isset($_POST["ViewerEmail"])) {
    die("Email not provided!");
}

$email = $_POST["ViewerEmail"];

$token = bin2hex(random_bytes(16));
$token_hash = hash("sha256", $token);
$expiry = date("Y-m-d H:i:s", time() + 60 * 30);

try {
    // Get the database connection
    $conn = require __DIR__ . "/DatabaseConnection.php";

    // Check if $conn is valid
    if (!$conn) {
        throw new Exception("Database connection failed.");
    }

    // Prepare SQL query
    $sql = "UPDATE viewer
            SET reset_token_hash = ?,
                reset_token_expires_at = ?
            WHERE ViewerEmail = ?";

    $stmt = $conn->prepare($sql);

    // Check if prepare succeeded
    if (!$stmt) {
        throw new Exception("Failed to prepare the statement: " . $conn->error);
    }

    // Bind parameters and execute
    $stmt->bind_param("sss", $token_hash, $expiry, $email);

    if (!$stmt->execute()) {
        throw new Exception("Failed to execute the statement: " . $stmt->error);
    }

    echo "Password reset instructions have been sent.";

} catch (Exception $e) {
    echo "An error occurred: " . $e->getMessage();
}


if ($conn->affected_rows) {

    $mail = require __DIR__ . "/Mailer.php";

    $mail->setFrom("noreply@example.com");
    $mail->addAddress($email);
    $mail->Subject = "Password Reset";
    $mail->Body = <<<END

    Click <a href="http://localhost/Online%20News%20Portal/Public/ResetPassword.php?token=$token">here</a> 
    to reset your password.

    END;

    try {

        $mail->send();

    } catch (Exception $e) {

        echo "Message could not be sent. Mailer error: {$mail->ErrorInfo}";

    }

}


echo "Please check your inbox. <br>";

echo '<a href="../Public/Homepage.php">Homepage</a>';

