<?php
session_start();
include('../connection.php');
if(isset($_SESSION["staff_id"]))
{
	$id= $_SESSION["staff_id"];
	$name= $_SESSION["staffName"];
	
	if((time()-$_SESSION['Active_Time'])>300)
	{
		header('Location:../loginS.php');
	}
	else
	{
		$_SESSION['Active_Time'] = time();
	}
}
else{
	header('Location: ../loginS.php');
}
$qry = mysqli_query($conn,"SELECT COUNT(*) as amount FROM delivery WHERE deliveryStatus!='Delivered'");

$row = mysqli_fetch_assoc($qry);

?>

<!doctype html>
<html lang="en" dir="ltr">
<head>
<meta charset="utf-8">
	<link rel="icon" href="../img/2.png" type="image/png" sizes="20x20">
<title>Rider Menu</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="menuStyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
	
	<style type="text/css">
    	
    	p
		{	
			margin-left: 50px;
			margin-top: 80px;
			font-size: 50px;
		}
		p.txt
		{
			margin-top: 15px;
			text-align: left;
			color:#162A69;
			margin-left: 165px;
		}

		p.txt1
		{
			margin-top: 120px;
			font-size: 40px;
		}

		p.txt2
		{
			margin-top: 20px;
			font-size: 40px;
		}
		
		p.txt3
		{
			margin-top: 50px;
			font-size: 40px;
		}

    </style>
</head>
	
<body>
	
	<nav>
		<input type="checkbox" id="check">
        <label for="check" class="checkbtn">
        <i class="fas fa-bars"></i>
		</label>
		<!--<label class="logo">FK Restaurant</label>-->
		<img src="../img/2.png" type="image/png" alt="FK Restaurant">
		<label class="logo">FK Restaurant</label>
		<ul>
		<li><a class="active" href="menu1.php">Home</a></li>
		<li><a href="rider_acceptorder.php">Delivered Status</a></li>
        <li><a href="rider_orderhistory.php">Delivered History</a></li>
        <li><a href="logout.php">Logout</a></li>
		</ul>
	</nav>
	
	<div>
	<p>Welcome, </p>
		<p class="txt"> <?php echo $_SESSION["staffName"]?>.</p><br><br>
	<p class="txt3">Note: <span><?php echo $row['amount']; ?></span> undelivered orders. Do you want to accept?</p>	
	<p class="txt1">Current Date : <span id="date-today"></span></p>
	<p class="txt2">Current Time : 
		<span id="current-time"></span>
	
	</div>
	
	
	
	<script>
		let dateToday = document.getElementById("date-today");
		
		let today = new Date();
		let day = `${today.getDate() < 10 ? "0" : ""}${today.getDate()}`;
		let month = `${(today.getMonth()+1) < 10 ? "0" : ""}${today.getMonth()+1}`;
		let year = today.getFullYear();
		
		dateToday.textContent = `${day}/${month}/${year}`;
	</script>
	<script>
		let time = document.getElementById("current-time");
		setInterval(()=>{
			let d = new Date();
			time.innerHTML = d.toLocaleTimeString();
		},10)
		</script>

	
</body>
</html>