

<?php  $title="Order Status"; include('header.php'); ?>
		
<?php $customer_id = $_SESSION['customer_id'];?>		 

<body class="order_status">

 <?php $order_status = mysqli_query($conn,"SELECT *,ors.order_id As order_id_orders  FROM orders ors LEFT JOIN delivery dly ON(dly.order_id = ors.order_id) WHERE ors.customer_id='".$customer_id."' ORDER By ors.orderDate DESC");?>

  <div class="resipt " style="width: 600px; margin: 20px auto; text-align: center;">
    FK Restaurant<br/>
    Address 1<br/>
    Address 2 <br/>
    387398 Selangor<br/>
    Malaysia
    <hr>
    <table class="table table-hover table-striped" style="width:100%">
      <thead class="thead-dark">
        <tr>
          <td style="padding:5px;"> NO </td>
          <td style="padding:5px;"> Order ID </td>
          <td style="padding:5px;"> ORDER STATUS </td>
          <td style="padding:5px;"> DELIVERY STATUS </td>
          <td style="padding:5px;"> DATE AND TIME </td>
          
        </tr>
      </thead>
      <tbody>
    <?php $no =1; 

     while($detail = mysqli_fetch_assoc($order_status)) { ?>
       <tr>
         <td style="padding:5px;"><?php echo $no;?></td>
         <td style="padding:5px;">#<?php echo $detail['order_id_orders'];?></td>
         <td style="padding:5px;"><?php echo $detail['orderStatus'];?></td>
         <td style="padding:5px;"><?php echo $detail['deliveryStatus'] ? $detail['deliveryStatus'] : 'Missing Order';?></td>
         <td style="padding:5px;"><?php echo $detail['orderDate'];?></td>
         
       </tr>
    <?php $no++; } ?>
    </tbody>
</table>

</div>
</body>