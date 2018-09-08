<?php
 session_start();
 $class = $_POST ;
 if(isset($_POST['email']))
  {
    $error = "";
    $create = true;
    $email = $_POST["email"];
    $password = $_POST["password"];
    $username = $_POST["username"];
    $confpassword = $_POST["confpassword"];
    if ($password == $confpassword)
    {
      $mysqli = new mysqli ("localhost","root",false,"ecommerce");
      $all = array();
      $result = $mysqli -> query("SELECT * FROM user");
      while ($row = mysqli_fetch_assoc($result)){array_push($all,$row);}
      foreach($all as $col)
         {
           if(strtoupper($email) == strtoupper($col["email"]))
            {   $error = "Email exist"."</br>"; $create = false; }
           if($username == $col["username"])
            {   $error .= "Username exist";  $create = false;  }
         }
      if ($create)
         {
          $result = mysqli_query($mysqli," INSERT INTO user(username,email,password) VALUES ('{$username}','{$email}','{$password}')");
          if( $result ){$_SESSION["username"] = $username;$_SESSION["email"] =$email;header('Location: '.'Home.php'); }
          mysqli_free_result($result);
          mysqli_close($mysqli);
         }
    }
    else { $error = "Password not matches"; }


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

    <title>Signout</title>

    <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="signout.css" rel="stylesheet">
  </head>
  <body class="text-center">
    <form class="form-signin" action="Signout.php" method="post">
      <div style="color : red">
         <?php
          if (isset($error)){echo "</br>".$error;}
          ?>
      </div>
      <img class="mb-4" src="logo.png" alt="" width="100" height="100">
      <h1 class="h3 mb-3 font-weight-normal">Please sign out</h1>
      <input type="texte" id="inputUsername" name= "username" class="form-control" placeholder="Username" style="border-bottom-left-radius:0px;border-bottom-right-radius:0px;" required autofocus>
      <label for="inputEmail" class="sr-only">Email address</label>
      <input type="email" id="inputEmail" name= "email" class="form-control" placeholder="Email address" style="border-top-left-radius:0px;border-top-right-radius:0px;" required autofocus>
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" style="border-bottom-left-radius:0px;border-bottom-right-radius:0px;" required>
      <label for="inputPassword" class="sr-only">Confirm Password</label>
      <input type="password" id="inputPassword" name="confpassword" class="form-control" placeholder="Confirm Password"  required>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Confirm</button>
      <p></br>© Abdallah 2017 - 2018</p>
    </form>
  </body>
</html>
