<?php
	$username = $_POST['username'];
	$email = $_POST['email'];
    $service = $_POST['service']

	// Database connection
	$conn = new mysqli('127.0.0.1','root','','petjohn');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into service(username, email, service) values(?, ?, ?)");
		$stmt->bind_param("sss", $username, $email, $service);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successful";
		$stmt->close();
		$conn->close();
	}
?>
