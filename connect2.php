<?php
	$name = $_POST['name'];
	$gmail = $_POST['gmail'];
	$phone = $_POST['phone'];
	$img = $_POST['img'];

	// $conn = new mysqli('sql308.epizy.com','epiz_25434610','BefgULAEbYEYUm','epiz_25434610_haitomns_webpage');
	$conn = new mysqli('localhost','root','','haitomns');
	if($conn->connect_error)
	{
		die('Connection Failed : '.$conn->connect_error);
	}
	else
	{
		$stmt = $conn->prepare("insert into image(name, gmail, phone, img) values(?,?,?,?)");
		$stmt->bind_param("ssss",$name, $gmail, $phone, $img);
		$stmt->execute();
		$stmt->close();
		$conn->close();
		header('Location: result.html');
	}
?>