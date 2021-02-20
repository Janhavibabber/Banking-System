<?php
session_start();
$server = "localhost";
$username = "root";
$password = "mysql";
$db_name = "customer";

$con = mysqli_connect($server, $username, $password, $db_name);
if(!$con){
    die("Connection failed");

}
$_SESSION['user']=$_POST['user'];
$_SESSION['sender']=$_SESSION['user'];
?>

<!DOCTYPE HTML>
<html lang="en">

<head>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <title>MONEY TRANSACTION</title>
    <!-- Including the bootstrap CDN -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"> </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="http://anijs.github.io/lib/anicollection/anicollection.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!--Including style sheet-->

    <link rel="stylesheet" href="viewcustomer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>

    <div class="navbar">
        <div class="logo">
            <img src="logo.png" id="logoimg" height="60px" width="70px">
        </div>

        <ul id="navlist">

            <li class="navlist"><a class='active' href="index.php"><i class='fa fa-home' aria-hidden='true'></i>Home</a></li>
            <li class="navlist"><a class='active' href="viewcustomer.php"><i class='fa fa-users' aria-hidden='true'></i>View Customers</a>
            </li>
            
            <li class="navlist"><a class='active' href="transactionhistory.php"><i class='fa fa-exchange'
                        aria-hidden='true'></i>Transaction History</a></li>

        </ul>
    </div>


    <div>

        <h1 class="title" style="color:purple">User Payment Transaction</h1>

        
<div class="acustomer" style="margin:2%;">
    <div class="row">
        <div class="col-sm" style="padding:1% 3%;">

            
            <div style="padding-top:2%;display:inline;">
                <h4 class="font-weight-bold"
                    style="color:purple;font-size:2em;;display:inline;margin:10px 5px 0px 5px;padding-top:1%">Customer
                    Details</h4>
            </div>
            <br><br>
            <div style="font-size:1.2em;">
            
                
    <?php
        if (isset($_SESSION['user']))
        {
          $user= $_SESSION['user'];
          $sql = "SELECT * FROM customer WHERE Name='$user'";
          $result =mysqli_query($con,$sql);
          while($row= mysqli_fetch_array($result))
          {
            echo "<p><b class='font'>User ID</b> &nbsp;: ".$row['id']."</p><br>";
            echo "<p name='sender'><b class='font'>Name&nbsp;&nbsp;</b>&nbsp;&nbsp;: ".$row['name']."</p><br>";
            echo "<p><b class='font'>Email ID</b> : ".$row['email']."</p><br>";
            echo "<p><b class='font'>Balance</b>&nbsp; :&nbsp;<b>&#8377;</b> ".$row['current balance']."</p>";
          }         
        }
    ?>

            </div>
        </div>
        <div class="col-sm" style="padding:1% 3%;">
            <div>
                <form action="successtransfer.php" method="POST">

                   
                    <div style="padding-top:2%;display:inline;">
                        <span class="font-weight-bold"
                            style="color:purple;font-size:1.8em;line-height:1em;display:inline;margin:10px 5px 0px 5px;padding-top:1%">Money
                            Transfer</span>
                    </div><br><br>
                    <b style="font-size:1.2em;">Sender</b> : <span style="font-size:1.2em;"><input id="myinput"
                            name="sender" disabled type="text" style="width:40%;border:none;"
                            value='<?php echo "$user";?>'></input></span>

                    <br><br><br>
                    <b style="font-size:1.2em;">Select Reciever:</b>
                    <select name="reciever" id="dropdown" required>
                        <option>Select Reciever</option>
                <?php
                        $server = "localhost";
                        $username = "root";
                        $password = "mysql";
                        $db_name = "customer";

                        $db = mysqli_connect($server, $username, $password, $db_name);
                        $res = mysqli_query($db, "SELECT * FROM customer WHERE Name!='$user'");
                        while($row = mysqli_fetch_array($res)) {
                            echo("<option> "."  ".$row['name']."</option>");
                }
                ?>
                    </select>
                    <br><br><br>
                    <b style="font-size:1.2em;">Amount to be transferred &#8377;:</b>
                    <input name="amount" type="number" style="width:35%;" min="100" required>
                    <br><br><br>
                    <button  id="transfer" name="transfer" class="btn-default"><b>Transfer</b></button>
                </form>
            </div>
        </div>
    </div>
    <style>
    
    </style>
    </body>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script>
        setTimeout(function () { $('#loading').hide(); }, 3000);
        var preloader = document.getElementById("loading");
        function loader() {
            preloader.style.display = 'none';
        }
    </script>

    </html>


    <footer>
        <p>Developed by Janhavi</p><br>
        <ul class="foot">
            Contact Me:
            <li><a target="_blank" class="github" href="https://github.com/Janhavibabber/"><i
                        class="fa fa-github fa-2x"></i></a></li>
            <li><a target="_blank" class="linkedin" href="www.linkedin.com/in/janhavi-babbar"><i
                        class="fa fa-linkedin fa-2x"></i></a></li>
        </ul>

    </footer>

</body>

</html>
