<?php 
	include 'connection.php';

	if(isset($_POST['transfer'])){
		$receiver = $_POST['receiver'];
		$amount = $_POST['amount'];
		$sender = $_POST['sender'];

	if ($amount <= 0) {
		printf("Error: amount should be greater than 0");
		exit();
	}

	$result1 = mysqli_query($con,"SELECT * FROM customer where name='$receiver'");
	if (!$result1) {
		printf("Error: account not found");
		exit();
	}

	$result2 = mysqli_query($con,"SELECT * FROM customer where name='$sender'");
	if (!$result2) {
		printf("Error: account not found");
		exit();
	}
	

	$c = "UPDATE customer SET `current balance`= `current balance`+'$amount' WHERE name='$receiver'";
	mysqli_query($con,$c);
	
	
	$e = "UPDATE customer SET `current balance`=`current balance`-'$amount' WHERE name='$sender'";
	mysqli_query($con,$e);
	
	$history = "INSERT INTO transaction(`sender`, `receiver`, `amount`) VALUES('$sender', '$receiver', '$amount')";
	mysqli_query($con,$history);

}
	
?>

<html>
<head>
<script>
alert("Your Transaction has been Successful");
window.location.href="viewcustomer.php";
</script>
</head>
<html>