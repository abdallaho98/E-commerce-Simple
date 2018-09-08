<?php
 session_start();
 $class = $_POST ;
 if (isset($_POST["email"]) && isset($_POST["password"]))
  {
    $email = $_POST["email"];
    $password = $_POST["password"];
    $mysqli = new mysqli ("localhost","root",false,"ecommerce");
    $all = array();
    $result = $mysqli -> query("SELECT * FROM user");
    while ($row = mysqli_fetch_assoc($result)){array_push($all,$row);}
    mysqli_free_result($result);
    mysqli_close($mysqli);
    foreach($all as $col)
       {
         if(strtoupper($email) == strtoupper($col["email"]))
          {   if($password == $col["password"])
               {
                 $_SESSION["username"] = $col['username'];
                 $_SESSION["email"] = $col['email'];
                 header('Location: '.'Home.php');
               }
              else { $error = "Password and email dont match";}
          }
         else{ $error = "email not found";}
       }
   }
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">
    <title>Signin</title>
    <script src='http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js'></script>
    <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
  </head>
  <body class="text-center">
    <form class="form-signin" action="Signin.php" method="post">
      <div  style="color : red">
         <?php
          if (isset($error)){echo "</br>".$error;}
          ?>
      </div>
      <img class="mb-4" src="logo.png" alt="" width="100" height="100">
      <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
      <label for="inputEmail" class="sr-only">Email address</label>
      <input type="email" id="inputEmail" name= "email" class="form-control" placeholder="Email address" required autofocus>
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Remember me
        </label>
      </div>
      <button class="btn btn-lg btn-primary btn-block" type="submit" id="signin">Sign in</button>
      <button class="btn btn-lg btn-primary btn-block"  id="signout" style="background-color:#8A2BE2" >
        <script> document.getElementById('signout').addEventListener("click",function(){window.location.href = "Signout.php";} ); </script>
        Sign out</button>
        <script> $('#signout').hover(function(){$(this).css("background-color", "#BA55D3");}, function(){$(this).css("background-color", "#8A2BE2");}); </script>
      <p></br>© Abdallah 2017 - 2018</p>
    </form>
  </body>
</html>
