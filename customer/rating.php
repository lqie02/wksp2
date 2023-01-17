    <link rel="stylesheet" a href="../footer.css">
    <?php $title = "Rating"; include('header.php') ;?>

<?php if(isset($_POST['submit'])){
    
  		$score = $_POST['score'];
		$text = $_POST['text'];
		$order_id = $_POST['order_id'];
		
   $query = mysqli_query($conn,"INSERT INTO rating(score,R_remark,order_id) VALUES ('$score','$text','$order_id')");

   if(mysqli_insert_id($conn)){
	  
  
   echo "<script>alert('Thank You For Your Rating');</script>";
	echo"<meta http-equiv='refresh' content='0; url=homepage.php'/>";
     
   }else{
    
  echo "<script>alert('Error on submit, please try again!');</script>";
   echo"<meta http-equiv='refresh' content='0; url=homepage.php'/>";
   }
}						 


?>
<head>
  <link href="css/stylerate.css" rel="stylesheet" type="text/css" media="all" />
</head>
<style>
body {
  background-image: url('../img/background.jpeg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;
}
</style>
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
            	  
             <li><input type="radio" name="score" value="5" id="excellent" required> 
            <label for="excellent">Very Good</label>
              <div class="check w3"></div>
         </li>
         <li><input type="radio" name="score" value="4" id="good"> 
            <label for="good" > Good</label>
              <div class="check w3ls"></div>
         </li>
         <li><input type="radio" name="score" value="3" id="neutral">
           <label for="neutral" >Neutral</label>
             <div class="check wthree"></div>
         </li>
         <li><input type="radio" name="score" value="2" id="poor"> 
            <label for="poor" >Poor</label>
              <div class="check w3_agileits"></div>
         </li>
         <li><input type="radio" name="score" value="1" id="poor"> 
            <label for="poor" >Very Poor</label>
              <div class="check w3_agileits"></div>
         </li>
       
	    	      <input type="submit" name="submit" value="Submit" class="btn btn-primary">
	        </div>
	    </form>

		<?php }  ?>
	</div>
   <?php include('../footer.php');?>
</body>

