<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "online news portal";
$port = "3308";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname, $port);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM super_admin WHERE SuperAdminEmail='$_POST[SuperAdminEmail]' and SuperAdminPassword='$_POST[SuperAdminPassword]'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    session_start();
    $_SESSION['SuperAdminEmail']=$_POST['SuperAdminEmail'];
    header("location:/Online News Portal/Super Admin/SuperAdminHomepage.php");
     

} 
else {
    mysqli_close($conn);

    echo "
		<script>
			alert('Invalid Username or Password');
			location.href = '/Online News Portal/Super Admin/SuperAdminSignIn.php';
		</script>";


	}

mysqli_close($conn);
?>
