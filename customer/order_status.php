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
		
			 

</tbody>

 <?php $order_status = mysqli_query($conn,"SELECT orderStatus, orderDate FROM orders WHERE customer_id='".$customer_id."'");?>

  <div class="resipt" style="width:350px; margin: 20px auto; text-align: center;">
    FK Restaurant<br/>
    Address 1<br/>
    Address 2 <br/>
    387398 Selangor<br/>
    Malaysia
    <hr>
    <table style="width:100%">
      <thead>
        <tr>
          <td> NO </td>
          <td> ORDER STATUS </td>
           <td> DATE AND TIME </td>
          
        </tr>
      </thead>
      <tbody>
    <?php $no =1; 

     while($detail = mysqli_fetch_assoc($order_status)) { ?>
       <tr>
         <td style="padding:5px;"><?php echo $no;?></td>
         <td style="padding:5px;"><?php echo $detail['orderStatus'];?></td>
         <td style="padding:5px;"><?php echo $detail['orderDate'];?></td>
         
       </tr>
    <?php $no++; } ?>
    </tbody>