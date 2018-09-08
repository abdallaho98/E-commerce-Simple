<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link href="header.css" rel="stylesheet">
</head>
<body>

<div class="jumbotron">
  <div class="container text-center">
    <h1>Online Store</h1>
    <p>Mission, Vission & Values</p>
  </div>
</div>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="Home.php">  <img src="logo.png" alt="" width="40" height="40" style="margin-top:-10px;"></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home</a></li>
        <li><a href="#">Products</a></li>
        <li><a href="#">Deals</a></li>
        <li><a href="#">Stores</a></li>
        <li><a href="#">Contact</a></li>
        <li>
            <section class="webdesigntuts-workshop">
  	           <form action="search.php" method="GET">
  		             <input type="text" name="search" placeholder="Search...">
  		             <button>Search</button>
  	           </form>
            </section>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <?php
         if (isset($_SESSION["username"]))
             {
               $str = '<li><a href="succes.php" ><span class="glyphicon glyphicon-user"></span>';
               $str2 ='</a></li><li><a href="succes.php"><span class="glyphicon glyphicon-shopping-cart"></span> Cart</a></li>';
               echo $str . $_SESSION["username"] .$str2 ;
             }
        else
             {
             echo '<li style="background-color:#FF0000;background: black;border-radius: 50px / 50px;margin:1px"><a href="Signin.php"><span class="glyphicon glyphicon-user"></span> Sign in</a></li>
             <li><a href="Signout.php"> Sign out</a></li>';
             }
         ?>
      </ul>
    </div>
  </div>
</nav>
