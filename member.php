<?php 
  //db configuration
	require 'dbConfig.php';

// User Authentiation
 include_once('shared\authenticateuser.php');
	
  // Check for success message
  if(isset($_SESSION["Success"]))
    $Success = $_SESSION["Success"];

	if(isset($_POST["FirstName"]))
	{
        $Title = "0"; //  $_POST["Title"]=="" || $_POST["Title"]==NULL ? "14" : $_POST["Title"];
        $FirstName = $_POST["FirstName"];
        $OtherNames = $_POST["OtherNames"];
        $Surname = $_POST["Surname"];
        
        $Gender = $_POST["Gender"];
        $BirthDate = $_POST["BirthDate"];
        $Country = $_POST["Country"];
        
        $Occupation = $_POST["Occupation"];
        $Email = $_POST["Email"];
        $PostalAddress = $_POST["PostalAddress"];
        
        $Contact1 = $_POST["Contact1"];
        $Contact2 = $_POST["Contact2"];
        $MemberNumber = $_POST["MemberNumber"];
        $SundaySchoolClass = "PT"; //$_POST["SundaySchoolClass"]=="" || $_POST["SundaySchoolClass"]==NULL ? "PT" : $_POST["Title"];
        $Entryperson = $_SESSION["userId"];

        $DateCreated = date('Y-m-d H:i:s');
        $DateModified = date('Y-m-d H:i:s');

      $query = "INSERT INTO `person`(`member_no`, `sundayschoolclass`, `title`, `surname`, 
      `firstname`, `othernames`, `gender`, `birthdate`, `country`, `occupation`, `email`, `postaladdress`, 
      `contact1`, `contact2`, `isdeleted`, `isactive`, `ismember`, `entryperson`, `datecreated`, `lastmodified`) VALUES 
      ('$MemberNumber','$SundaySchoolClass','$Title','$Surname','$FirstName','$OtherNames','$Gender','$BirthDate','$Country',
      '$Occupation','$Email','$PostalAddress','$Contact1','$Contact2',0,1,0,'$Entryperson','$DateCreated','$DateModified')";
      
      echo $query;
      //return;

      $dbConn->query($query);

      if($dbConn->affected_rows < 1 && $dbConn -> errno == 1062)
      {
          echo $dbConn->error;
          echo " An error occured, please make sure you entered a unique member number.";
          return;
      }
      else if($dbConn->affected_rows < 1 ){
          echo "Error " . $dbConn->errno . "<br /> ". $dbConn->error;
          echo " An error occured.";
          return;
      }
      else{
        $_SESSION["Success"]="Success!, $FirstName $Surname has added.";

			// Redirect to page
			header("Location: member.php");
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

    <title>COP | Member</title>
    <link rel="icon" href="images/oWLCC-favicon.png" sizes="16x16" type="image/png">
    <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    
    <!-- Custom Theme Style -->
    <link href="build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
 <?php include_once('shared\navbar.php'); ?> 
            <br />
       <?php include_once('shared\sidebar.php'); ?>
           
       <?php include_once('shared\menuFooterButtons.php'); ?>
           
      </div>
    </div>

        <?php include_once('shared\topnav.php'); ?>

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Church Membership Page</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                              <button class="btn btn-default" type="button">Go!</button>
                          </span>
                  </div>
                </div>
              </div>
            </div>
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title"> 
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <form class="form-horizontal form-label-left" novalidate action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

                     
                      <span class="section">Personal Info</span>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="MemberNumber">Member Number <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="MemberNumber" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="1" name="MemberNumber" placeholder="Memeber Number" required="required" type="text">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="SundaySchoolClass">Sunday School Class<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="SundaySchoolClass" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="1" name="SundaySchoolClass" placeholder="Sunday School Class" required="required" type="text">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="FirstName">Title<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="Title" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="1" name="Title" placeholder="Title" type="text">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="FirstName">First Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="FirstName" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="1" name="FirstName" placeholder="First Name" required="required" type="text">
                        </div>
                      </div>
                       <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="OtherNames">Other Names <span class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="OtherNames" class="form-control col-md-7 col-xs-12" name="OtherNames" placeholder="Other Names" type="text">
                        </div>
                      </div>
                       <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Surname">Surname<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="Surname" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="1" name="Surname" placeholder="Surname" required="required" type="text">
                        </div>
                      </div>
                       <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Gender">Gender <span class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="Gender" class="form-control col-md-7 col-xs-12" data-validate-length-range="1" name="Gender" placeholder="Gender" type="text">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="BirthDate">Date Of Birth <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="BirthDate" class="form-control col-md-7 col-xs-12" name="BirthDate" placeholder="Date of Birth" type="text">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Contact1">Phone Number<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="Contact1" name="Contact1" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Contact2">Phone Number 2 <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="Contact2" name="Contact2" placeholder="" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Country">Country <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="Country" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="1" name="Country" placeholder="Country" type="text">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Occupation">Occupation <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="Occupation" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="1" name="Occupation" placeholder="Occupation" type="text">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="email" id="Email" name="Email" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="PostalAddress">Postal Address <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="PostalAddress" name="PostalAddress" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      
                     <!-- <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="occupation">Occupation <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="occupation" type="text" name="occupation" data-validate-length-range="5,20" class="optional form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label for="password" class="control-label col-md-3">Password</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="password" type="password" name="password" data-validate-length="6,8" class="form-control col-md-7 col-xs-12" required="required">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label for="password2" class="control-label col-md-3 col-sm-3 col-xs-12">Repeat Password</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="password2" type="password" name="password2" data-validate-linked="password" class="form-control col-md-7 col-xs-12" required="required">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="telephone">Telephone <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="tel" id="telephone" name="phone" required="required" data-validate-length-range="8,20" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Textarea <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea id="textarea" required="required" name="textarea" class="form-control col-md-7 col-xs-12"></textarea>
                        </div>
                      </div>-->
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <button type="submit" class="btn btn-primary">Cancel</button>
                          <button id="send" type="submit" class="btn btn-success">Submit</button>
                          <input type="hidden" id="Message" value=<?php if(isset($_SESSION['Success'])){echo $_SESSION['Success'];} else { echo ""; } ?> />
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

         <?php include_once('shared\footer.php'); ?>
      </div>
    </div>

    <!-- jQuery -->
    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="vendors/nprogress/nprogress.js"></script>
    <!-- validator -->
    <script src="vendors/validator/validator.min.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="build/js/custom.min.js"></script>

 <!-- PNotify -->
    <script src="vendors/pnotify/dist/pnotify.js"></script>
    <script src="vendors/pnotify/dist/pnotify.buttons.js"></script>
    <script src="vendors/pnotify/dist/pnotify.nonblock.js"></script>

    <!-- validator -->
    <script>
      // initialize the validator function
      validator.message.date = 'not a real date';

      // validate a field on "blur" event, a 'select' on 'change' event & a '.reuired' classed multifield on 'keyup':
      $('form')
        .on('blur', 'input[required], input.optional, select.required', validator.checkField)
        .on('change', 'select.required', validator.checkField)
        .on('keypress', 'input[required][pattern]', validator.keypress);

      $('.multi.required').on('keyup blur', 'input', function() {
        validator.checkField.apply($(this).siblings().last()[0]);
      });

      $('form').submit(function(e) {
        e.preventDefault();
        var submit = true;

        // evaluate the form using generic validaing
        if (!validator.checkAll($(this))) {
          submit = false;
        }

        if (submit)
          this.submit();

        return false;
      });

$(document).ready(function(){
  //debugger;
   
  var success=$('#Message').val();

  //if(success!='')
    //MemberAdded();
});

function MemberAdded(){
      new PNotify({
                    title: 'Regular Success',
                    text: 'That thing that you were trying to do worked!',
                    type: 'success',
                    styling: 'bootstrap3'
                });
}
    </script>
    <!-- /validator -->
  </body>
</html>