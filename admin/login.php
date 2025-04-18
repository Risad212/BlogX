<?php
session_start();
if (isset($_SESSION['user_id'])) {
  header('Location: index.php');
}

require_once "../vendor/autoload.php";

$login = new App\classes\Login();

if (isset($_POST['login'])) {
  $login_error =  $login->loginCheck($_POST);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Mosaddek">
  <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <link rel="shortcut icon" href="img/favicon.html">

  <title>Admin Login</title>

  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/bootstrap-reset.css" rel="stylesheet">
  <!--external css-->
  <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet" />
</head>

<body class="login-body">
  <div class="container">
    <form class="form-signin" method="POST">
      <h2 class="form-signin-heading">Login</h2>
      <div class="login-wrap">
        <input type="text" name="username" class="form-control" placeholder="Username" autofocus>
        <input type="password" name="password" class="form-control" placeholder="Password">
        <label class="checkbox">
          <input type="checkbox" value="remember-me"> Remember me
          <span class="pull-right">
            <a data-toggle="modal" href="#"> Forgot Password?</a>
          </span>
        </label>
        <button class="btn btn-lg btn-login btn-block" name="login" type="submit">Login</button>
        <p>or you can sign in via social network</p>
        <p><?php isset($login_error) ? $login_error : '' ?></p>
      </div>
    </form>
  </div>



  <!-- js placed at the end of the document so the pages load faster -->
  <script src="js/jquery.js"></script>
  <script src="js/bootstrap.bundle.min.js"></script>


</body>

</html>