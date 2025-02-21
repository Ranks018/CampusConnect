<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "online news portal";
$port = 3308;


$conn = new mysqli($servername, $username, $password, $dbname, $port);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $stmt = $conn->prepare("SELECT ViewerPassword FROM viewer WHERE ViewerEmail = ?");
    $stmt->bind_param("s", $_POST["ViewerEmail"]);
    $stmt->execute();
    $result = $stmt->get_result();
    

    $viewer = $result->fetch_assoc();
    
    if ($viewer && password_verify($_POST["ViewerPassword"], $viewer["ViewerPassword"])) {

        $_SESSION['ViewerEmail'] = $_POST['ViewerEmail'];
        header("Location: /Online News Portal/Viewer/ViewerHomepage.php");
        exit;
    } else {

        $stmt->close();
        $conn->close();
        echo "
            <script>
                alert('Invalid Username or Password');
                location.href = '/Online News Portal/Public/Homepage.php';
            </script>";
    }


    $stmt->close();
    $conn->close();
}




?>
