<?php
	//db configuration
	require 'dbConfig.php';
	
	//Start session
  session_start(); 
  
	if(isset($_POST["username"]))
	{
    $errorMsg = '';
		$userName = $_POST["username"];
		$password = $_POST["password"];
		$userId = "";
		
		$query = "SELECT * FROM church_app.users where `username` = '$userName' and password = md5('$password')";
		$result = $dbConn->query($query);
  
		//echo $query;
    //print_r($result); 
    //return;

		if ($result != null && $result -> num_rows > 0) {
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
		else {
		    $errorMsg = "Invalid username or password.";
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

    <title>COPIM | Login </title>

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
              <h1>Login</h1>
              <div>
                <input type="text" class="form-control" id="username" name="username" placeholder="username" required="" />
              </div>
              <div>
                <input type="password" class="form-control" id="password" name="password" placeholder="password" required="" />
              </div>
            <?php if(isset($errorMsg)){
              echo '<div class="alert alert-danger">' . $errorMsg . '</div><div>'; }
            ?>
            <div>
                <input type="submit" class="btn btn-default submit" value="Log in" style="width:80%;"><br /><br>
                <a class="reset_pass" href="#" style="float:left; margin-left:32%;">Lost your password?</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">New to site?
                  <a href="register.php" class="to_register"> Create Account </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <a href=""><img src="images\citadel.jpeg" style="width:100%;"> </a>
                  <!--<h1>Word Of Life Christian Centre</h1>-->
                  <h1>Church Management App</h1>
                  <p><?php echo "&copy; ".date("Y") ?> All Rights Reserved.</p>
                  <a href="">Citadel of Power International Ministries - COPIM</a>
                </div>
              </div>
            </form>
          </section>
        </div>

        <div id="register" class="animate form registration_form">
          <section class="login_content">
            <form>
              <h1>Create Account</h1>
              <div>
                <input type="text" class="form-control" placeholder="Username" required="" />
              </div>
              <div>
                <input type="email" class="form-control" placeholder="Email" required="" />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" required="" />
              </div>
              <div>
                <a class="btn btn-default submit" href="index.html">Submit</a>
              </div>

              <div class="clearfix"></div> 
              <div class="separator">
                <p class="change_link">Already a member ?
                  <a href="#signin" class="to_register"> Log in </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <!-- <h1><i class="fa fa-paw"></i>Citadel Of Power</h1> -->
                  <h1>Church Management App</h1>
                  <a href="">Citadel of Power International Ministries - COPIM</a>
                  <p><?php echo "&copy; ".date("Y") ?> All Rights Reserved. Privacy and Terms</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>