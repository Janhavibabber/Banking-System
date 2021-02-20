<?php  

include 'connection.php';

 ?> 

<!DOCTYPE HTML>
<html lang="en">
<head>

    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8">
		<title>CUSTOMER DETAILS</title>
		 <link rel="stylesheet" href="viewcustomer.css">
		 	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	</head>
<body>
	

<div class="navbar">
  <div class="logo">
    <img src="logo.png" id="logoimg" height="60px" width="70px">
  </div>

<ul id="navlist">
  
  <li class="navlist"><a  class='active' href="index.php"><i class='fa fa-home' aria-hidden='true'></i>Home</a></li>
  
   
    <li class="navlist"><a  class='active' href="transactionhistory.php"><i class='fa fa-exchange' aria-hidden='true'></i>Transaction History</a></li>

</ul>
</div>
</body>

 <div class="dark-overlay">
  	<div>
    <h1 class="title" style="color: purple">Customer Details</h1>
    

  </div>

  <br>

  <table class="table" align=center style="font-family: serif; color: purple; background-color: plum; margin: auto; width:90%">
		<thead>
			<th>CUSTOMER ID</th>
			<th>NAME</th>
			<th>EMAIL</th>
			<th>BALANCE</th>
			<th>&nbsp;</th>
		</thead>
		<tbody>
		<?php
		        $q="select * from customer";
				$result=mysqli_query($con,$q);
		        while($row = mysqli_fetch_array($result)){
		            echo "<tr>";
		            echo "<form method ='post' action = 'transfer.php'>";
		            echo "<td>". $row['id'] . "</td>
		            <td>". $row['name'] . "</td>
		            <td>". $row['email'] . "</td>
		            <td>". $row['current balance'] . "</td>";
		           echo "<td> <a href='transfer.php'><button type='submit' class='btn btn-default' name='user'  id='users1' value= '{$row['name']}' >Transfer</button></a></td>";
		        echo "</form>";
		           echo  "</tr>";
		        }
		        ?>
		</tr>
		</tbody>
	</table>
</div>


<footer>
  <p>Developed by Janhavi</p><br>
  	<ul class="foot">
  	Contact Me:
   <li><a target="_blank" class="github" href="https://github.com/Janhavibabber/"><i class="fa fa-github fa-2x"></i></a></li>	
   <li><a target="_blank" class="linkedin" href="www.linkedin.com/in/janhavi-babbar"><i class="fa fa-linkedin fa-2x"></i></a></li> 
</ul>

</footer>

</body>
</html>