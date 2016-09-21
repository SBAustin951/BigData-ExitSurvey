<?php
  if(!empty($_POST['email'])) {
    if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
      $email = $_POST['email'];
      $plans = $_POST['plans'];
      $strengths = $_POST['strengths'];
      $weaknesses = $_POST['weaknesses'];
      $timestamp = time();

      $con = new mysqli('localhost','root','Norcross1!','survey_data');
      if($con->connect_error) {
        echo "Failed to connect to MySQL:".$con->connect_error;
      }
      $sql = "INSERT INTO survey(email,plans,strengths,weaknesses,times) VALUES ('$email','$plans','$strengths','$weaknesses','$timestamp')";
      if($con->query($sql) == false) {
        echo $con->error."<br/>";
      }
      $con->close();
      empty($_POST['email']);
    }
  }
?>

<!DOCTYPE html>
<html lang="en" style="height:100%">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Guest</title>
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
    <p><a href="Login.php">Login Page</a></p>
  </div>
  <div class="container-fluid jumbotron" style="height:230px;padding-top:10px;background-color:transparent">
    <h1><strong>Exit Survey</strong></h1>
    <h3>Department of Computer Science</h3>
    <h3>Valdosta State University</h3>
  </div>
  <div class="container-fluid">
    <form method="post">
      <div class="form-group">
        <label for="email">Email Address:</label>
        <input type="email" class="form-control" name="email" id="email" style="width:400px;" required><br/>
        <label for="plans">What are your plans after graduation?</label>
        <select class="form-control" name="plans" id="plans" style="width:400px">
          <option>Back to School - at Valdosta State</option>
          <option>Back to School - elsewhere</option>
          <option>Employment in CS or a related field</option>
          <option>Employment in some other field</option>
          <option>Taking a year off!</option>
          <option>Not sure yet</option>
          <option>Other</option>
        </select><br/>
        <label for="strengths">What do you perceive to be the strengths of the computer science program?</label>
        <textarea class="form-control" name="strengths" id="strengths" rows="4" style="width:550px"></textarea><br/>
        <label for="weaknesses">What do you perceive to be the weaknesses of the computer science program?</label>
        <textarea class="form-control" name="weaknesses" id="weaknesses" rows="4" style="width:550px"></textarea><br/>
        <strong><input type="submit" name="submit" class="form-control" style="width:100px"></strong>
      </div>
    </form>
  </div>
</body>
</html>
