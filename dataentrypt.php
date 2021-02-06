<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/style1.css">
  <title>Enter Data to Secure</title>
</head>
<body>

  <div class="container cbox">
    <div class="row">
      <div class="col-md-12" style="">
        <h3>Enter Here</h3>
        <div class="panel-body">
          
          <form action="" method="POST">
            <div class="form-group">
              <label>Website Name</label>
              <input type="text" name="webname" class="form-control" required>
            </div>
            <div class="form-group">
              <label>Website's Username</label>
              <input type="text" name="webuname" class="form-control" required>
            </div>
            <div class="form-group">
              <label>Password</label>
              <input type="password" name="password" class="form-control" required>
            </div>
            <div class="form-group">
              <label>Key</label>
              <input type="password" name="key" class="form-control" required>
            </div>
            
            <button type="submit" name="submit" class="btn btn-primary" style="float: none;">Encrypt & Store
            </button>  
         
          </form>
        </div>
      </div>
    </div>
  </div>
  </form>
 
</div>
</body>
</html>
<?php

$db=mysqli_connect('localhost','root','','registration');
if (isset($_POST['submit'])) {

    error_reporting(0);
      $sname = $_POST['webname'];
      $uname = $_POST['webuname'];
      $pass = $_POST['password'];
      $key = $_POST['key'];

      $alphalib = ('0123456789abcdefghijklmnopqrstuvwxyz.@#$ABCDEFGHIJKLMNOPQRSTUVWXYZ');
      
      function chopWord($theword)
      {
        $chop = str_split($theword);
        return $chop;
      }

      function toposition($letter,$shift)
      {
        global $alphalib;
        $alphalibLength = strlen($alphalib);
        $answer = strpos($alphalib, $letter);
        return ($answer + $shift) % $alphalibLength;
      }

      function tocipher($number)
      {
        global $alphalib;
        return $alphalib[$number];
      }

      if($sname!="" && $uname!="" && $pass!="" && $key!="")
      {
        $i = 2;
        $key = chopWord($key);
        foreach ($key as $k) {
          $tem = $tem . ($k*$i++);
        }
        $key = $tem;

        $uname = chopWord($uname);
        foreach ($uname as $l) {
          $temp = $temp.tocipher(toposition($l,$key));
        }
        $uname = $temp;

        $pass = chopWord($pass);
        foreach ($pass as $p) {
          $tempp = $tempp.tocipher(toposition($p,$key));
        }
        $pass = $tempp;

      // form validation: ensure that the form is correctly filled ...
      // by adding (array_push()) corresponding error unto $errors array
      if (empty($sname)) { array_push($errors, "Site name is required"); }
      if (empty($uname)) { array_push($errors, "User name is required"); }
      if (empty($pass)) { array_push($errors, "Password is required"); }



      $query = "INSERT INTO sitetable (id, user, sitename, siteusername, sitepassword) 
          VALUES('', '$userprofile', '$sname', '$uname', '$pass')";
      $results = mysqli_query($db, $query);
      if (mysqli_num_rows($results)) 
      {
        $_SESSION['username'] = $username;
        $_SESSION['success'] = "Data Entered";
        header('location: home.php');
      }else {
        array_push($errors, "Please enter the correct information");
      }
  }

}

?>