<?php
	$firstName = $_POST['firstName'];
	$lastName = $_POST['lastName'];
	$gender = $_POST['gender'];
	$email = $_POST['email'];
	$address = $_POST['address'];
	$phno = $_POST['phno'];
  $waste = $_POST['waste'];
  $wastetype = $_POST['wastetype'];
  $pickup = $_POST['pickup'];
  $postal = $_POST['postal'];

	// Database connection
	$conn = new mysqli('localhost','root','','test');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into registration(firstName, lastName, gender, email, address, phno, waste, wastetype, pickup, postal) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("sssssiissi", $firstName, $lastName, $gender, $email, $address, $phno, $waste, $wastetype, $pickup, $postal);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully... We will collect your waste on the pickup location as soon as possible. You will be informed when to come to the location";
		$stmt->close();
		$conn->close();
	}
?>
