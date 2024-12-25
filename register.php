<?php
	//db configuration
	require 'dbConfig.php';
	
	//Start session
	session_start(); 
	if(isset($_POST["username"])){
		$userName = $_POST["username"];
    $password = $_POST["password"];
    $email = $_POST["email"];
		$userId = "";
		
    $query = "SELECT * FROM church_app.users WHERE `email` = '$email'";
    $result = $dbConn->query($query);
     if ($result != null && $result -> num_rows > 0) {
       $errorMsg = "An account already exists with email address: $email";
        //echo $errorMsg;
       
  }
else{
          $query = "INSERT INTO church_app.users (`username`,`password`,`email`) Values ('$userName', md5('$password'), '$email')";   
          $result = $dbConn->query($query);
          
          //echo $query; 
          //print_r($result); return;

          $query = "SELECT * FROM church_app.users WHERE `email` = '$email' AND `username` = '$userName'";
          $result = $dbConn->query($query);
         
          //echo $query;
          //print_r($result);

          if ($result != null && $result->num_rows > 0) {
              // output data of each row
              while($row = $result->fetch_assoc()) {
                $userName = $row["username"];
                $userId = $row["userid"];
              }
              
              // Set session variables
              $_SESSION["userName"] = $userName;
              $_SESSION["userId"] = $userId;
            
            //print_r($_SESSION);
            //return;
            
            // Redirect to page
            header("Location: index.php");
          }
		}
		
		$dbConn->close();
		
	}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>WLCC - Church App </title>

    <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="https://colorlib.com/polygon/gentelella/css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
        <section class="login_content">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
              <h1>Create Account</h1>
              <div>
                <input type="text" class="form-control" name="username" placeholder="Username" required="" />
              </div>
              <div>
                <input type="email" class="form-control" name="email" placeholder="Email" required="" />
              </div>
              <div>
                <input type="password" class="form-control" name="password" placeholder="Password" required="" />
              </div>
              <div>
                <input type="submit" class="btn btn-default submit" value="Submit">
              </div>
              <h4><span class="label label-info"><?php if(isset( $errorMsg))echo $errorMsg; ?></span></h4>
              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Already a member ?
                  <a href="login.php" class="to_register"> Log in </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                <h1>Church Management App</h1>
                  <p><?php echo "&copy; ".date("Y") ?> All Rights Reserved. COP Privacy and Terms</p>
                </div>
              </div>
            </form>
          </section>
        </div>
 
      </div>
    </div>
  </body>
</html>