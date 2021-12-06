<?php
session_start();

$host = 'localhost';
$db = 'Mytestdb';
$user = 'root';
$password = '';
$dsn = "mysql:host=$host;dbname=$db;charset=UTF8";

try {
	$conn = new mysqli($host, $user, $password, $db);
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$username = $_POST['username'];
		$password = $_POST['password'];
		if (
			(isset($username)) ||
			(isset($password))
		) {
			$sql = "SELECT * FROM tbllogin WHERE username = '$username' AND password = '$password' ";
			$result = mysqli_query($conn, $sql);

			if ($result) {
					$user_data = mysqli_fetch_assoc($result);
					if ($user_data && $user_data['password'] === $password && $user_data['username'] === $username) {
						$_SESSION["user_id"] = $user_data['id'];
						header("Location:backend.php");
						die;
					}else {
						header("Location:loginform_backend.php");		
					}				
				}
				 
			}

			//  print_r($stmt->fetch());

		} else {
			echo "Are you robot?";
		}
	}
 catch (PDOException $e) {
	echo $e->getMessage();
}
