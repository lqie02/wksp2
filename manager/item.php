<?php $title= "Item"; include('headeritem.php');?>

<?php 

if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   $delete_query = mysqli_query($conn,"DELETE FROM `item` WHERE item_id = $delete_id ");
   //$check_delete_row = mysqli_fetch_assoc($delete_query);


   if($check_delete_row){
      header('location:/wksp2/manager/item.php');
      $message[] = 'product has been deleted';
   }else{
      header('location:/wksp2/manager/item.php'); 
      $message[] = 'product could not be deleted';
   };
}

 if(isset($_POST['add_product'])){

   $p_name = $_POST['p_name'];
   $p_price = $_POST['p_price'];
   $p_status= $_POST['p_status'];
   $p_category_id = $_POST['p_category_id'];
   $p_image = $_FILES['p_image']['name'];
   $p_image_tmp_name = $_FILES['p_image']['tmp_name'];
   $p_image_folder = '../images/'.$p_image;
   $p_image_folder_path = '/images/'.$p_image;

   move_uploaded_file($p_image_tmp_name, $p_image_folder);

   $insert_query = mysqli_query($conn,"INSERT INTO item SET itemName = '" .$p_name."', unitPrice = '" . $p_price ."', itemStatus ='".$p_status."', category_id = '".$p_category_id."', image='".$p_image_folder_path."', staff_id = '".$_SESSION['staff_id']."'");

   if(mysqli_insert_id($conn)>0){

      $message[] = 'product add succesfully';
      header('location:/wksp2/manager/item.php');
   }else{
      $message[] = 'could not add the product';
      header('location:/wksp2/manager/item.php');
   }

 }
 if(isset($_POST['update_product'])){
  
  $update_p_id = $_POST['update_p_id'];
  $update_p_name = $_POST['update_p_name'];
  $update_p_price = $_POST['update_p_price'];
  $update_p_status= $_POST['update_p_status'];
  $update_p_category_id = $_POST['category_id'];
  $update_p_image = $_FILES['update_p_image']['name'];
  $update_p_image_tmp_name = $_FILES['update_p_image']['tmp_name'];
  
  $update_p_image_folder = '../images/'.$update_p_image;
  
  if($_FILES['update_p_image']['tmp_name']){
     move_uploaded_file($update_p_image_tmp_name, $update_p_image_folder);
     $update_p_image_folder_path = '/images/'.$update_p_image;
  }else{
  	 $update_p_image_folder_path = $_POST['image'];
  }

  $query = mysqli_query($conn,"UPDATE item SET itemName = '" . $update_p_name."', unitPrice = '" . $update_p_price ."', itemStatus ='".$update_p_status."', category_id = '".$update_p_category_id."', image='".$update_p_image_folder_path."' WHERE item_id='".$update_p_id."'");

   if($query){
      $message[] = 'product updated succesfully';
      header('location:/wksp2/manager/item.php');
   }else{
      $message[] = 'product could not be updated';
      header('location:/wksp2/manager/item.php');
   }

 }
?>
<body>
<div class="container">

<section>
 <?php $category_query = mysqli_query($conn,"SELECT * FROM `category`");?>
<form action="" method="post" class="add-product-form" enctype="multipart/form-data">
   <h3>Add a New Product</h3>
   <input type="text" name="p_name" placeholder="Enter the product name" class="box" style="font-size: 15px" required>
   <input type="number" name="p_price" min="0" placeholder="Enter the product price" class="box" style="font-size: 15px" required>
   <select name="p_category_id" style="font-size: 15px">
      	<?php while($fetch_category = mysqli_fetch_assoc($category_query)) {?>
      	<option value="<?php echo $fetch_category['category_id'];?>" ><?php echo $fetch_category['categoryName'];?></option>
        <?php } ?>
   </select>

      <input type="varchar" name="p_status" min="0" placeholder="Enter the status" class="box" style="font-size: 15px" required>
      <input type="file" name="p_image" accept="image/png, image/jpg, image/jpeg" class="box" style="display: inline;" required>
      <input type="submit"  value="Add product" name="add_product" class="btn btn-primary" style="margin-bottom:5px; font-size: 15px">
</form>

</section>
<br>
<section class="display-product-table">

   <table class="table table-bordered table-hover">

      <thead>
		  <tr style="font-size: 15px">
      	 <th style="width:10px;">NO.</th>
		  <th>PRODUCT IMAGE</th>
         <th>PRODUCT NAME</th>
         <th>PRODUCT PRICE</th>
       <!--   <th>Product Status</th>-->
         <th>ACTION</th></tr>
      </thead>

      <tbody>
      	 <?php $items = mysqli_query($conn,"SELECT * FROM item "); ?>
         <?php if (mysqli_num_rows($items) > 0){ ?>
	        <?php $no = 1; while($item = mysqli_fetch_assoc($items)){?>
              <tr style="font-size: 15px">
              	<td ><?php echo $no;?></td>
              	<td ><img src="../<?php echo $item['image']; ?>" style="width: 100px;" alt=""></td>
              	<td><?php echo $item['itemName'];?></td>
              	<td>RM <?php echo $item['unitPrice'];?></td>
              	<td>
				   <a href="item.php?edit=<?php echo $item['item_id']; ?>" style='color: black' class="option-button"> <i class="fas fa-edit" style='color: black'></i> Update </a>&nbsp;&nbsp;
	               <a href="item.php?delete=<?php echo $item['item_id']; ?>" style='color: black' class="delete-btn" onclick="return confirm('are your sure you want to delete this?');"> <i class="fas fa-trash" style='color: black'></i> Delete </a> 
	              
	            </td>
              </tr>
	        <?php  $no++; } ?>
	     <?php } else {?>
           <tr>
           	<td colspan="5"><div class='empty'>no product added</div></td>
           </tr>
	     <?php } ?>
        
      </tbody>
   </table>

</section>

<section class="edit-form-container">

   <?php
   
   if(isset($_GET['edit'])){
      $edit_id = $_GET['edit'];
      $edit_query = mysqli_query($conn,"SELECT * FROM `item` WHERE item_id ='".$edit_id."'");
      $row = mysqli_fetch_assoc($edit_query);

       if(mysqli_num_rows($edit_query) > 0){
       	$category_query = mysqli_query($conn,"SELECT * FROM `category`");
   ?>

   <form action="" method="post" enctype="multipart/form-data" style="margin-bottom: 30px;">

      <img src="../<?php echo $row['image']; ?>" style="width: 150px;margin-right: 30px;" alt="">
      <input type="hidden" name="image" value="<?php echo $row['image'];?>">
      <input type="hidden" name="update_p_id" value="<?php echo  $row['item_id']; ?>">
      <input type="text"  required name="update_p_name" value="<?php echo $row['itemName']; ?>">
      <input type="number" min="0" class="box" required name="update_p_price" value="<?php echo $row['unitPrice']; ?>">
      <input type="varchar" min="0" class="box" required name="update_p_status" value="<?php echo $row['itemStatus']; ?>"><br/>
      <div style="margin-bottom:10px;"></div>
      <select name="category_id" >
      	<?php while($category = mysqli_fetch_assoc($category_query)) { ?>
      		<?php if($row['category_id'] == $category['category_id'] ) { ?>
      		  <option value="<?php echo $category['category_id'];?>" selected><?php echo $category['categoryName'];?></option>
      	    <?php } else {?>
      	      <option value="<?php echo $category['category_id'];?>"><?php echo $category['categoryName'];?></option>
      	    <?php } ?>
      	<?php } ?>
      </select>
      <input type="file" name="update_p_image" accept="image/png, image/jpg, image/jpeg" style="display:inline;">

      <input type="submit" value="update the product" name="update_product" class="btn">
   </form>

   <?php
        }
         echo "<script>document.querySelector('.edit-form-container').style.display = 'flex';</script>";
     }
   ?>

</section>

</div>
</body>