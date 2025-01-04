<?php
session_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);

if (!isset($_SESSION['login'])) {
	header('location:../index.php');
	exit();
}

if (isset($_POST['submit'])) {
	try {
		include('../config/MyFunction.php');
		$obj = new DbFunction();

		// Handle file upload
		$imageUrl = null;
		if (isset($_FILES['memberImage']) && $_FILES['memberImage']['error'] === UPLOAD_ERR_OK) {
			$allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
			$maxSize = 5 * 1024 * 1024; // 5MB

			if (!in_array($_FILES['memberImage']['type'], $allowedTypes)) {
				throw new Exception('Invalid file type. Only JPG, PNG and GIF are allowed.');
			}

			if ($_FILES['memberImage']['size'] > $maxSize) {
				throw new Exception('File is too large. Maximum size is 5MB.');
			}

			$uploadDir = '../uploads/members/';
			if (!file_exists($uploadDir)) {
				mkdir($uploadDir, 0777, true);
			}

			$fileName = time() . '_' . basename($_FILES['memberImage']['name']);
			$targetPath = $uploadDir . $fileName;

			if (!move_uploaded_file($_FILES['memberImage']['tmp_name'], $targetPath)) {
				throw new Exception('Failed to upload file.');
			}

			$imageUrl = 'uploads/members/' . $fileName;
		}

		// Validate required fields
		$requiredFields = ['member_no', 'firstname', 'surname', 'gender', 'contact1'];
		foreach ($requiredFields as $field) {
			if (empty($_POST[$field])) {
				throw new Exception("$field is required.");
			}
		}

		// Create person with validated data
		$result = $obj->create_person(
			htmlspecialchars($_POST['member_no']),
			htmlspecialchars($_POST['firstname']),
			htmlspecialchars($_POST['surname']),
			htmlspecialchars($_POST['gender']),
			filter_var($_POST['email'], FILTER_SANITIZE_EMAIL),
			htmlspecialchars($_POST['contact1']),
			htmlspecialchars($_POST['title']),
			$imageUrl,
			htmlspecialchars($_POST['maritalStatus']),
			htmlspecialchars($_POST['nameOfSpouse']),
			htmlspecialchars($_POST['isYourSpouseAChristian']),
			filter_var($_POST['numOfChildren'], FILTER_SANITIZE_NUMBER_INT),
			htmlspecialchars($_POST['residenceAddress']),
			htmlspecialchars($_POST['houseNumber']),
			htmlspecialchars($_POST['residenceLandMark']),
			htmlspecialchars($_POST['phoneNumber']),
			htmlspecialchars($_POST['jobStatus']),
			htmlspecialchars($_POST['nameOfEmployer']),
			htmlspecialchars($_POST['jobTitle']),
			htmlspecialchars($_POST['officeContact']),
			htmlspecialchars($_POST['educationLevel']),
			htmlspecialchars($_POST['areYouBornAgain']),
			htmlspecialchars($_POST['dateBornAgain']),
			htmlspecialchars($_POST['whatIsYourGiftForChristianService']),
			htmlspecialchars($_POST['dateYouJoinedChurch']),
			htmlspecialchars($_POST['department']),
			htmlspecialchars($_POST['whoIntroducedYouToThisChurch']),
			htmlspecialchars($_POST['membersLivingCloseToYou'])
		);

		if ($result === false) {
			throw new Exception('Failed to create person record.');
		}
	} catch (Exception $e) {
		echo "<script>alert('Error: " . addslashes($e->getMessage()) . "');</script>";
	}
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
												<label>Profile Image</label>
											</div>
											<div class="col-lg-6">
												<input type="file" class="form-control" name="memberImage" accept="image/jpeg,image/png,image/gif">
												<small class="text-muted">Max file size: 5MB. Allowed formats: JPG, PNG, GIF</small>
											</div>
										</div>
										<br><br>
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
											<div class="col-lg-4">
												<label>Marital Status</label>
											</div>
											<div class="col-lg-6">
												<select class="form-control" name="maritalStatus">
													<option value="">Select Status</option>
													<option value="Single">Single</option>
													<option value="Married">Married</option>
													<option value="Divorced">Divorced</option>
													<option value="Widowed">Widowed</option>
												</select>
											</div>
										</div>
										<br><br>
										<div class="form-group">
											<div class="col-lg-4">
												<label>Name of Spouse</label>
											</div>
											<div class="col-lg-6">
												<input class="form-control" name="nameOfSpouse">
											</div>
										</div>
										<br><br>
										<div class="form-group">
											<div class="col-lg-4">
												<label>Is Your Spouse A Christian?</label>
											</div>
											<div class="col-lg-6">
												<select class="form-control" name="isYourSpouseAChristian">
													<option value="">Select</option>
													<option value="Yes">Yes</option>
													<option value="No">No</option>
												</select>
											</div>
										</div>
										<br><br>
										<div class="form-group">
											<div class="col-lg-4">
												<label>Number of Children</label>
											</div>
											<div class="col-lg-6">
												<input type="number" class="form-control" name="numOfChildren">
											</div>
										</div>
										<br><br>
										<div class="form-group">
											<div class="col-lg-4">
												<label>Residence Address</label>
											</div>
											<div class="col-lg-6">
												<input class="form-control" name="residenceAddress">
											</div>
										</div>
										<br><br>
										<div class="form-group">
											<div class="col-lg-4">
												<label>House Number</label>
											</div>
											<div class="col-lg-6">
												<input class="form-control" name="houseNumber">
											</div>
										</div>
										<br><br>
										<div class="form-group">
											<div class="col-lg-4">
												<label>Residence Landmark</label>
											</div>
											<div class="col-lg-6">
												<input class="form-control" name="residenceLandMark">
											</div>
										</div>
										<br><br>
										<div class="form-group">
											<div class="col-lg-4">
												<label>Phone Number</label>
											</div>
											<div class="col-lg-6">
												<input class="form-control" name="phoneNumber">
											</div>
										</div>
										<br><br>
										<div class="form-group">
											<div class="col-lg-4">
												<label>Job Status</label>
											</div>
											<div class="col-lg-6">
												<select class="form-control" name="jobStatus">
													<option value="">Select Status</option>
													<option value="Employed">Employed</option>
													<option value="Unemployed">Unemployed</option>
													<option value="Self-Employed">Self-Employed</option>
												</select>
											</div>
										</div>
										<br><br>
										<div class="form-group">
											<div class="col-lg-4">
												<label>Name of Employer</label>
											</div>
											<div class="col-lg-6">
												<input class="form-control" name="nameOfEmployer">
											</div>
										</div>
										<br><br>
										<div class="form-group">
											<div class="col-lg-4">
												<label>Job Title</label>
											</div>
											<div class="col-lg-6">
												<input class="form-control" name="jobTitle">
											</div>
										</div>
										<br><br>
										<div class="form-group">
											<div class="col-lg-4">
												<label>Office Contact</label>
											</div>
											<div class="col-lg-6">
												<input class="form-control" name="officeContact">
											</div>
										</div>
										<br><br>
										<div class="form-group">
											<div class="col-lg-4">
												<label>Education Level</label>
											</div>
											<div class="col-lg-6">
												<select class="form-control" name="educationLevel">
													<option value="">Select Level</option>
													<option value="Primary">Primary</option>
													<option value="Secondary">Secondary</option>
													<option value="Tertiary">Tertiary</option>
													<option value="Graduate">Graduate</option>
												</select>
											</div>
										</div>
										<br><br>
										<div class="form-group">
											<div class="col-lg-4">
												<label>Are You Born Again?</label>
											</div>
											<div class="col-lg-6">
												<select class="form-control" name="areYouBornAgain">
													<option value="">Select</option>
													<option value="Yes">Yes</option>
													<option value="No">No</option>
												</select>
											</div>
										</div>
										<br><br>
										<div class="form-group">
											<div class="col-lg-4">
												<label>Date Born Again</label>
											</div>
											<div class="col-lg-6">
												<input type="date" class="form-control" name="dateBornAgain">
											</div>
										</div>
										<br><br>
										<div class="form-group">
											<div class="col-lg-4">
												<label>Gift for Christian Service</label>
											</div>
											<div class="col-lg-6">
												<input class="form-control" name="whatIsYourGiftForChristianService">
											</div>
										</div>
										<br><br>
										<div class="form-group">
											<div class="col-lg-4">
												<label>Date You Joined Church</label>
											</div>
											<div class="col-lg-6">
												<input type="date" class="form-control" name="dateYouJoinedChurch">
											</div>
										</div>
										<br><br>
										<div class="form-group">
											<div class="col-lg-4">
												<label>Department</label>
											</div>
											<div class="col-lg-6">
												<input class="form-control" name="department">
											</div>
										</div>
										<br><br>
										<div class="form-group">
											<div class="col-lg-4">
												<label>Who Introduced You?</label>
											</div>
											<div class="col-lg-6">
												<input class="form-control" name="whoIntroducedYouToThisChurch">
											</div>
										</div>
										<br><br>
										<div class="form-group">
											<div class="col-lg-4">
												<label>Members Living Close To You</label>
											</div>
											<div class="col-lg-6">
												<input class="form-control" name="membersLivingCloseToYou">
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