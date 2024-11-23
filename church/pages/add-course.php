<?php
session_start();

if (!(isset($_SESSION['login']))) {
	header('location:../index.php');
}

if (isset($_POST['submit'])) {
    include('../config/MyFunction.php');
    $obj = new DbFunction();
    $obj->create_person(
        $_POST['member_no'], 
        $_POST['firstname'], 
        $_POST['surname'], 
        $_POST['gender'], 
        $_POST['email'], 
        $_POST['contact1'],
        $_POST['title']  
    );
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>Add Person</title>
	<!-- Bootstrap Core CSS -->
	<link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
	<!-- MetisMenu CSS -->
	<link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
	<!-- Custom CSS -->
	<link href="../dist/css/sb-admin-2.css" rel="stylesheet">
	<!-- Custom Fonts -->
	<link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>

<body>
<form method="post">
	<div id="wrapper">
		<!-- Navigation -->
		<?php include('leftbar.php'); ?>
		<div id="page-wrapper">
			<div class="row">
				<div class="col-lg-12">
					<h4 class="page-header"><?php echo strtoupper("welcome" . " " . htmlentities($_SESSION['login'])); ?></h4>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<div class="panel panel-default">
						<div class="panel-heading">Add Person</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-lg-10">
									<div class="form-group">
										<div class="col-lg-4">
											<label>Member No<span style="font-size:11px;color:red">*</span></label>
										</div>
										<div class="col-lg-6">
											<input class="form-control" name="member_no" required="required">
										</div>
									</div>
									<br><br>
									<div class="form-group">
										<div class="col-lg-4">
											<label>First Name<span style="font-size:11px;color:red">*</span></label>
										</div>
										<div class="col-lg-6">
											<input class="form-control" name="firstname" required="required">
										</div>
									</div>
									<br><br>
									<div class="form-group">
										<div class="col-lg-4">
											<label>Surname<span style="font-size:11px;color:red">*</span></label>
										</div>
										<div class="col-lg-6">
											<input class="form-control" name="surname" required="required">
										</div>
									</div>
									<br><br>
									<div class="form-group">
										<div class="col-lg-4">
											<label>Gender<span style="font-size:11px;color:red">*</span></label>
										</div>
										<div class="col-lg-6">
											<select class="form-control" name="gender" required="required">
												<option value="">Select Gender</option>
												<option value="M">Male</option>
												<option value="F">Female</option>
											</select>
										</div>
									</div>
									<br><br>
									<div class="form-group">
										<div class="col-lg-4">
											<label>Email</label>
										</div>
										<div class="col-lg-6">
											<input class="form-control" name="email">
										</div>
									</div>
									<br><br>
									<div class="form-group">
										<div class="col-lg-4">
											<label>Contact 1<span style="font-size:11px;color:red">*</span></label>
										</div>
										<div class="col-lg-6">
											<input class="form-control" name="contact1" required="required">
										</div>
									</div>
									<br><br>
									<div class="form-group">
									<div class="col-lg-4">
										<label>Title</label>
									</div>
									<div class="col-lg-6">
										<select class="form-control" name="title">
											<option value="0">None</option>
											<option value="1">Mr.</option>
											<option value="2">Mrs.</option>
											<option value="3">Dr.</option>
											<option value="4">Rev.</option>
										</select>
									</div>
									</div>
									<br><br>
									<div class="form-group">
										<div class="col-lg-4"></div>
										<div class="col-lg-6">
											<input type="submit" class="btn btn-primary" name="submit" value="Add Person">
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</form>
<script src="../bower_components/jquery/dist/jquery.min.js" type="text/javascript"></script>
<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
<script src="../bower_components/metisMenu/dist/metisMenu.min.js" type="text/javascript"></script>
<script src="../dist/js/sb-admin-2.js" type="text/javascript"></script>
</body>
</html>
