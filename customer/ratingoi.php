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
<!DOCTYPE html>
<html>
<head> 
<title>Feedback</title>
<!-- custom-theme -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <meta name="keywords" content="footer, address, phone, icons" />
<meta charset="utf-8">
<link rel="icon" href="img/tooth.png" type="image/png" sizes="20x20">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="keywords" content="Elegant Feedback Form  Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //custom-theme -->
<link href="css/stylerate.css" rel="stylesheet" type="text/css" media="all" />
<link href="//fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
</head>
<!-- <body style= "background: url(jpg); background: no - repeat; background - size : center; height: 100%"> -->
<body>
    <div class="container">
    <?php if(isset($_GET['order_id'])){
            $order_info = mysqli_query($conn,"SELECT * FROM orders WHERE order_id='".$_GET['order_id']."'");
          }
     
        if(isset($order_info) && $order_info->num_rows > 0 ){ 
      ?>
    <h1 class="agile_head text-center">Rate Us</h1>
    <div class="w3layouts_main wrap">
	  <h3>Please help us to serve you better by taking a couple of minutes. </h3>
	    <form action="feedback.php" method="post" class="agile_form">
		  <h2>How satisfied were you with our Service?</h2>
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
			 </ul>	  
			<h2>If you have specific feedback, please write to us...</h2>
			<textarea placeholder="Additional comments" class="w3l_summary" name="comments" required=""></textarea>
			<input type="text" placeholder="Your Name (optional)" name="name"  />
			  <div class="col-sm-10">
                <input type="hidden" name="order_id" value="<?php echo $_GET['order_id'];?>">
                <input type="text" name="name" class="form-control" value="<?php echo $_SESSION['custName'];?>" readonly>
               </div>

			<center><input type="submit" value="submit Feedback  " class="agileinfo" /></center>
	  </form>
	</div>
	<div class="agileits_copyright text-center">
			<p>© 2022</p>
	</div>
}
</body>
</html>

