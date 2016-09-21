<?php
  session_start();
  if(isset($_POST['username']) && isset($_POST['pw'])) {
    unset($_SESSION['username']);
    if($_POST['pw'] == 'admin' && $_POST['username'] == 'admin') {
      $_SESSION['username'] = $_POST['username'];
      $_SESSION['pw'] = $_POST['pw'];
      header("Location: admin.php");
      return;
    }
    else {
      $_SESSION['error'] = "Incorrect login";
      header('Location: Login.php');
      return;
    }
  }
?>

<!DOCTYPE html>
<html lang="en" style="height:100%">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login</title>
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href='http://fonts.googleapis.com/css?family=Vollkorn' rel='stylesheet'  type='text/css'>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
    body {
        background: #24C6DC; /* fallback for old browsers */
        background: -webkit-linear-gradient(to bottom, #24C6DC , #514A9D); /* Chrome 10-25, Safari 5.1-6 */
        background: linear-gradient(to bottom, #24C6DC , #514A9D); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
    }
  </style>
</head>

<body style="color:#000000;font-family:vollkorn">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-2"></div>
      <div class="col-md-4">
        <h2><strong>Admin Login</strong></h2>
        <?php
          if(isset($_SESSION['error'])) {
            echo("<p  class='alert alert-danger' style='width:350px'>".$_SESSION['error']."</p>\n");
            unset($_SESSION['error']);
          }
        ?>
        <form method="post">
          <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" class="form-control" name="username" id="username" style="width:350px"><br/>
            <label for="pw">Password:</label>
            <input type="password" class="form-control" name="pw" id="pw" style="width:350px"><br/>
            <strong><input type="submit" name="submit" class="form-control" value="Login" style="width:100px"></strong>
          </div>
        </form>
      </div>
      <div class="col-md-6">
        <br/><br/><br/><br/><br/>
        <h2>Or, <a href="guest.php" style="color:blue">Continue as a guest</a></h2>
      </div>
    </div>
</body>
</html>
