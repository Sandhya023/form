<?php
	$firstName = $_POST['firstName'];
	$lastName = $_POST['lastName'];
	$email = $_POST['email'];
	$gender = $_POST['gender'];
	$department = $_POST['department'];
	$jobTitle = $_POST['jobTitle'];
	
	$phone = $_POST['phone'];
	$address = $_POST['address'];
	$code = $_POST['code'];

	// Database connection
	$conn = new mysqli('localhost','root','','test');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into record(firstName, lastName, email, gender, department, jobTitle, phone, address, code) values(?, ?, ?, ?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("ssssssssi", $firstName, $lastName, $email, $gender, $department, $jobTitle, $phone, $address, $code);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Employee Information Form</title>
	<link rel="stylesheet" href="styles.css">
	
</head>
<body>

<div class="wrapper">
    <div class="title">
      Employee Information Form
    </div>
    <div class="form">
      <div class="inputfield">
        <input type="submit" value="Show Details" class="btn">

       
      </div>
    </div>
</div>
</body>
</html>