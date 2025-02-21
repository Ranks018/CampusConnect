<?php

$token = $_GET["token"];

$token_hash = hash("sha256", $token);

$conn = require __DIR__ . "/../DatabaseConnection.php";

$sql = "SELECT * FROM viewer
        WHERE account_activation_hash = ?";

$stmt = $conn->prepare($sql);

$stmt->bind_param("s", $token_hash);

$stmt->execute();

$result = $stmt->get_result();

$viewer = $result->fetch_assoc();

if ($viewer === null) {
    die("token not found");
}

$sql = "UPDATE viewer
        SET account_activation_hash = NULL
        WHERE ViewerId = ?";

$stmt = $conn->prepare($sql);

$stmt->bind_param("s", $viewer["ViewerId"]);

$stmt->execute();

?>
<!DOCTYPE html>
<html>
<head>
    <title>Account Activated</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
</head>
<body>

    <h1>Account Activated</h1>

    <p>Account activated successfully. You can now
       <a href="http://localhost/Online%20News%20Portal/Public/Homepage.php">log in</a>.</p>

</body>
</html>