<?php
  session_start();
  if(!isset($_SESSION['username'])) {
    header("Location: Login.php");
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin</title>
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet'  type='text/css'>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
    body {
        background: #24C6DC; /* fallback for old browsers */
        background: -webkit-linear-gradient(to left, #24C6DC , #514A9D); /* Chrome 10-25, Safari 5.1-6 */
        background: linear-gradient(to left, #24C6DC , #514A9D); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
    }
  </style>
</head>

<body style="font-family:Volkorn">
  <?php
    if(isset($_POST['logout'])) {
      session_destroy();
      header("Location: Login.php");
    }
  ?>
  <form method="post">
    <div class="form-group">
      <input type="submit" class="form-control" name="logout" value="Logout" style="width:100px"/>
    </div>
  </form>
  <?php
    if(isset($_POST['delete'])) {
      if(isset($_POST['deleter'])) {
        $con = new mysqli('localhost','root','Norcross1!','survey_data');
        if($con->connect_error) {
          echo "Failed to connect to MySQL:".$con->connect_error;
        }

        $deleter = $_POST['deleter'];

        $sql = "DELETE FROM survey WHERE email like '$deleter'";

        $result = $con->query($sql);
        $con->close();
      }
    }
  ?>
  <form method="post">
    <div class="radio">
      <label><input type="radio" class="radio-inline" id="ascend" name="sort" value="ascend" onclick="javascript:submit()"><strong>Ascend</strong></label>&nbsp
      <label><input type="radio" class="radio-inline" id="descend" name="sort" value="descend" onclick="javascript:submit()"><strong>Descend</strong></label>
    </div>
  </form>
  <form method="post">
    <div class="form-group">
      <input type="text" class="form-control" placeholder="Input email to delete" name="deleter" style="width:300px;float:left"/>
    </div>
      <a href="admin.php">
        <label><input type="submit" class="form-control" name="delete" value="Delete" style="width:100px;float:left"/></label>
      </a>
    </div>
  </form>
      <?php
        $con = new mysqli('localhost','root','Norcross1!','survey_data');
        if($con->connect_error) {
          echo "Failed to connect to MySQL:".$con->connect_error;
        }

        if(isset($_POST['sort'])) {
          if($_POST['sort'] == 'ascend') {
            $sql = "SELECT * FROM survey ORDER BY times ASC";
          } else {
            $sql = "SELECT * FROM survey ORDER BY times DESC";
          }
        } else {
          $sql = "SELECT * FROM survey ORDER BY times DESC";
        }
        $result = $con->query($sql);
        print"<table class='table table-striped'>
                <thead>
                  <tr>
                    <th>Email</th>
                    <th>Plans</th>
                    <th>Strengths</th>
                    <th>Weaknesses</th>
                  </tr>
                </thead
                <tbody>";
        if($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            echo "
                  <tr>
                      <td>".$row['email']."</td>
                      <td>".$row['plans']."</td>
                      <td>".$row['strengths']."</td>
                      <td>".$row['weaknesses']."</td>
                  <tr/>
                 ";
          }
        }
        print"</tbody></table>";

        $con->close();
      ?>
  </table>
</body>
</html>
