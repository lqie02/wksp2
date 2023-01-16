<?php  $title="Order Status"; include('header.php'); ?>
		
<?php $customer_id = $_SESSION['customer_id'];?>		 
<style>
body {
  background-image: url('../img/background.jpeg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;
}
</style>

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