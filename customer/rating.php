    <link rel="stylesheet" a href="../footer.css">
    <?php $title = "Rating"; include('header.php') ;?>

<?php if(isset($_POST['submit'])){
    
    if(isset($_POST['rating'])){
    	$rating = $_POST['rating'];
    }else{
    	$rating = 0;
    }
   
   $query = mysqli_query($conn,"INSERT INTO rating SET score='".$rating."', R_remark='".$_POST['text']."', order_id ='".$_POST['order_id']."'");

   if(mysqli_insert_id($conn)){
   	 echo '<h2 style="text-align: center;">Thank You For Your Rating</h2>';
     exit;
   }else{
      echo '<h3 style="text-align: center;">Error on submit pls try again!</h3>';
   }
   

}
?>
<head>
  <link href="css/stylerate.css" rel="stylesheet" type="text/css" media="all" />
</head>
<body>

		<?php if(isset($_GET['order_id'])){
            $order_info = mysqli_query($conn,"SELECT * FROM orders WHERE order_id='".$_GET['order_id']."'");
          }
	   
	      if(isset($order_info) && $order_info->num_rows > 0 ){ 
	    ?>

    <h1 class="agile_head text-center">Rate Us</h1>
    <div class="w3layouts_main wrap">
    <h3>Please help us to serve you better by taking a couple of minutes. </h3>
      <form action="rating.php" method="post" class="agile_form">
      <h2>How satisfied were you with our Service?</h2>
       <ul class="agile_info_select">
	    <form method="POST" action="<?php echo $_SERVER['PHP_SELF'].'?order_id='.$_GET['order_id'];?>" class="form-horizontal" style="margin-top: 30px;">
	    	<div class="form-group required">
               <label class="control-label col-sm-2" for="input-review">Name</label>

               <div class="col-sm-15">
               	<input type="hidden" name="order_id" value="<?php echo $_GET['order_id'];?>">
                <input type="text" name="name" class="form-control" value="<?php echo $_SESSION['custName'];?>" readonly>
               </div>

	    	</div>
	    	<div class="form-group required">
	    		  <label class="control-label col-sm-2" for="input-review">Review</label>
                  <div>
                  	<textarea name="text" rows="5" id="input-review" class="form-control"></textarea>
                  </div>
            </div>
          <h2 >How satisfied were you with our Service?</h2>
       <ul class="agile_info_select">
            	  
                  <li><input type="radio" name="view" value="excellent" id="excellent" required> 
            <label for="excellent">excellent</label>
              <div class="check w3"></div>
         </li>
         <li><input type="radio" name="view" value="good" id="good"> 
            <label for="good"> good</label>
              <div class="check w3ls"></div>
         </li>
         <li><input type="radio" name="view" value="neutral" id="neutral">
           <label for="neutral">neutral</label>
             <div class="check wthree"></div>
         </li>
         <li><input type="radio" name="view" value="poor" id="poor"> 
            <label for="poor">poor</label>
              <div class="check w3_agileits"></div>
         </li>
       
	    	      <input type="submit" name="submit" value="Submit" class="btn btn-primary">
	        </div>
	    </form>

		<?php } else { ?>
			<h2 style="text-align:center;">Order Not Found</h2>
		<?php } ?>
	</div>
   <?php include('../footer.php');?>
</body>

