<?php/*
session_start();
include('../connection.php');
if(isset($_SESSION["customer_id"]))
{
	$id = $_SESSION["customer_id"];
	
	if((time()-$_SESSION['Active_Time'])>300)
	{
		header('Location:../index.php');
	}
	else
	{
		$_SESSION['Active_Time'] = time();
	}
}
else{
	header('Location: ../index.php');
}
?>

<?php include('header.php'); ?>
		
			  <br><br><br>
				<!--<h2 class="txt1">Delivered History</h2>-->     
		  	 
			<div class="container">
			<table class="table table-hover text-center">
				 <thead class="table-dark">
				
				<tr>
					
					<th scope="col">ORDER ID</th>
					<th scope="col">DATE AND TIME</th>	
					<th scope="col">STATUS</th>						
				</tr>
			    </thead>
				<tbody>
				

<?php if(isset($_GET['orderStatus'])){
            $status = mysqli_query($conn,"SELECT * FROM orders WHERE orderStatus='".$_GET['orderStatus']."'");}

             $row = mysqli_fetch_assoc($status);

  if(isset($row['orderStatus'])){
    $orderStatus = $row['orderStatus'];}?>
     
	  <td><?php echo $row['order_id'] ?></td>
	  <td><?php echo $row['orderDate'] ?></td>
	  <td><?php echo $row['orderStatus'] ?></td>



	</tr>

</tbody>