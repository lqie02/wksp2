    <link rel="stylesheet" a href="../footer.css">  <?php 

$title = "Payment Page"; include('header.php');


     if(isset($_POST['Pay_Now'])) {
       if (isset($_SESSION['items']) && !empty($_SESSION['items'])){
           $total = 0; 
           $total_qty=0; 
           foreach($_SESSION['items'] as $key => $qty) { 
               $query = mysqli_query($conn,"SELECT * FROM item WHERE item_id='".$key."'");
               if($query->num_rows > 0) { 
                 $row_product = mysqli_fetch_assoc($query);
                 $total += $row_product['unitPrice'] * $qty;
                 $total_qty += $qty;
               } 
           } 

           if($_POST['discount']){
             $discount_query = mysqli_query($conn,"SELECT * FROM voucher WHERE code='".$_POST['discount']."'");
             $row_discount = mysqli_fetch_assoc($discount_query);
             $voucher_no = $row_discount['voucher_no'];
           }else{
             $voucher_no = 0; 
           }

           //add main order 
           $order_query = mysqli_query($conn,"INSERT INTO orders SET amount = '" .(float)$total ."', qty = '" .(int)$total_qty . "', orderStatus ='Succesful', discount ='".(float)$_POST['discount_total']."', total = '".(float)$_POST['final_total']."', customer_id = '".$_SESSION['customer_id']."', orderDate = NOW() ");

           $order_id =mysqli_insert_id($conn);


           $payment_query = mysqli_query($conn,"INSERT INTO payment SET totalAmount = '".(float)$_POST['final_total']."', order_id = '".(int)$order_id ."', paymentDate = NOW(), payMethod = '".$_POST['payMethod']."' , voucher_no ='".$voucher_no."'");


           $delivery_query = mysqli_query($conn,"INSERT INTO delivery SET deliveryStatus = 'Pending', order_id = '".(int)$order_id ."', dateTime = NOW() ");

           
           foreach($_SESSION['items'] as $key => $qty) { 
              $item_detail = mysqli_query($conn,"SELECT * FROM item WHERE item_id='".$key."'");
              $row = mysqli_fetch_assoc($item_detail);
              $order_query = mysqli_query($conn,"INSERT INTO order_detail SET order_id = '" .(int)$order_id ."', item_id = '" .(int)$key . "', quantity ='".(int)$qty."', name ='".$row['itemName']."', price ='".(float)$row['unitPrice']."'");
           }


      } 

      
    }//end post if
?>
<style>
body {
  background-image: url('../img/background.jpeg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;
}
table, th, td {
  border: 1.5px solid black;
  margin-left: -300px;

}
	hr{
		border: 1.5px solid black;
	}
</style>
<?php if(isset($order_id)){ unset($_SESSION['items']); unset($_SESSION['order']);?>
  <h2  class = "location-logo">Thank You For Your Payment</h2>
  <h3 style="text-align: center;">Order Placed : Order ID #<?php echo $order_id;?></h3>

  <?php $order_info = mysqli_query($conn,"SELECT * FROM orders WHERE order_id='".$order_id."'");
   $row = mysqli_fetch_assoc($order_info);
  ?>
  <?php $order_details = mysqli_query($conn,"SELECT * FROM order_detail WHERE order_id='".$order_id."'");?>

  <h2><div class="receipt" style="width:350px; margin: 20px auto; text-align: center;">
    <b>FK Restaurant</b><h2><br/>
    Lorong Bukit Beruang Utama 1<br/>
    75450 Ayer Keroh <br/>
    Melaka, Malaysia<br/>
   
    <hr>
    <table style="width:300%" >
      <thead>
        <tr>
         <td><h2>&nbsp; NO. </h2></td>
          <td><h2>&nbsp;ITEM</h2></td>
          <td><h2>&nbsp;QTY</h2></td>
          <td><h2>&nbsp;PRICE</h2></td>
          <td><h2>&nbsp;TOTAL</h2></td>
        </tr>
      </thead>
      <tbody>
    <?php $no =1; 

     while($detail = mysqli_fetch_assoc($order_details)) { ?>
       <tr>
         <td><h2 style="padding:5px;"><?php echo $no;?></h2></td>
         <td><h2 style="padding:5px;"><?php echo $detail['name'];?></h2></td>
         <td><h2 style="padding:5px;"><?php echo $detail['quantity'];?></h2></td>
         <td><h2 style="padding:5px;">RM <?php echo $detail['price'];?></h2></td>
         <td><h2 style="padding:5px;">RM <?php echo $detail['price']*$detail['quantity'];?></h2></td>
       </tr>
    <?php $no++; } ?>
    </tbody>
    <tfoot>
      <tr>
        <td><h2 colspan="6" style="background-color: #ffd9b3"style="text-align:left;">&nbsp;Sub Total </td>
        <td><h2>RM <?php echo $row['amount'];?></td>
      </tr>
       <tr>
        <td><h2 colspan="6" style= "background-color: #ffd9b3"  style="text-align:left;">&nbsp;Discount </td>
        <td><h2>RM <?php echo $row['discount'];?></td>
      </tr>
      <tr>
        <td><h2 colspan="6"style="background-color: #ffd9b3" style="text-align:left;">&nbsp;Total </td>
        <td><h2>RM <?php echo $row['total'];?></td>
      </tr>
    </tfoot>
   </table>
  </div>

<div style="text-align:center;">
  <h2><a href="/wksp2/customer/rating.php?order_id=<?php echo $order_id;?>">Rate us</a></h2>
</div>

<?php }  ?>
 <?php include('../footer.php');?>