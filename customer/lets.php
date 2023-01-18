<?php session_start(); include('../connection.php'); //include('../includes/DatabaseClass.php'); ?>


<!DOCTYPE html>
<html lang="en">
<style>
  p.thicker {
  font-weight: 1000;
  margin-top: 10px;
  font-size: 35px;

}
  </style>
<head>

  <meta charset="utf-8">
  
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="../img/2.png" type="image/png" sizes="20x20">
  
    <!-- Bootstrap core CSS-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- Custom styles for this template-->
    <link rel="stylesheet" href="/wksp2/customer/css/styleheader.css" />
    <link rel="stylesheet" href="/wksp2/customer/css/style.css">
    <link rel="stylesheet" href="/wksp2/customer/css/bootstrap.css">

    <!-- js files -->
    <script src="../js/jquery-2.1.1.min.js"></script>
    <script src="../js/jquery-ui.js"></script>
    
    
    <title><?php echo  $title; ?></title>
</head>

   <div class="menu-bar">
    <img src="../img/kecik.png" type="image/png" alt="FK Restaurant">
     <h1 class="logo">FK<span>Restaurant</span></h1>
      <ul>     
       <li><a href="../regCust.php"><p class="thicker">Lets Order  <i class="fa fa-home"></i></a></li>
    </div>
