<?php include ("header.php");
 ?>
<html>
<head>
  <link href="search.css" rel="stylesheet">
<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?php

$mysqli = new mysqli ("localhost","root",false,"ecommerce");
$all = array();
$result = $mysqli -> query("SELECT * FROM announce");
while ($row = mysqli_fetch_assoc($result)){array_push($all,$row);}
mysqli_free_result($result);
mysqli_close($mysqli);
foreach($all as $col)
{
     $username = $col['username'];
     $Title = $col["Title"];
     $Description = $col['Description'];
     $Datetime = strtotime($col['Timenow']);
     $Price = $col['price'];
     $Day = date('d', $Datetime);
     $Month =date('M', $Datetime) ;
     $search = true;
     if(isset($_GET['search'])){if( strpos(strtoupper($Title),strtoupper($_GET['search'])) === false ) { $search = false; } }
     if($search)
     {
     echo '  <div class="card">
         <div class="thumbnail"><img class="left" src="http://cdn2.hubspot.net/hubfs/322787/Mychefcom/images/BLOG/Header-Blog/photo-culinaire-pexels.jpg"></div>
         <div class="right">
           <h1 class="title">' . $Title . '</h1>
           <div class="author"><img src="https://randomuser.me/api/portraits/men/95.jpg">
             <h2 class="user">' . $username . '</div>
             <div class="separator"></div>
             <p class="Desc">' . $Description .'</p><div class="separator2"></div>
           </div>
           <ul>
           <li><h5 class="Day">' . $Day .'</h5>
           <h6 class="Month">' . $Month .'</h6></li>
           <li><h1 class="Price">' . $Price . '</h1></li>
           </ul>
         </div>' ;
      }
}
?>





</body>
</html>
