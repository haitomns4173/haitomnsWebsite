<?php
	$name = $_POST['name'];
	$gmail = $_POST['gmail'];
	$phone = $_POST['phone'];
	$subject = $_POST['subject'];
	$message = $_POST['message'];

	$conn = new mysqli('localhost','root','','haitomns');
	// $conn = new mysqli('sql308.epizy.com','epiz_25434610','BefgULAEbYEYUm','epiz_25434610_haitomns_webpage');
	if($conn->connect_error)
	{
		die('Connection Failed : '.$conn->connect_error);
	}
	else
	{
		$stmt = $conn->prepare("insert into contact(name, gmail, phone, subject, message) values(?,?,?,?,?)");
		$stmt->bind_param("sssss",$name, $gmail, $phone, $subject, $message);
		$stmt->execute();
		$stmt->close();
		$conn->close();
		header('Location: result.html');
	}
?>