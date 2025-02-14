<?php
require('Database.php');
//$db = Database::getInstance();
//$mysqli = $db->getConnection(); 
class DbFunction
{

	function login($loginid, $password)
	{
		if (!ctype_alpha($loginid) || !ctype_alpha($password)) {
			echo "<script>alert('Either LoginId or Password is Missing')</script>";
		} else {
			try {
				$db = Database::getInstance();
				$mysqli = $db->getConnection();
				$query = "SELECT username, password FROM church_app.users where username=? and password=? ";
				
				// $query = "SELECT * FROM users ";
				// $result = $mysqli->query($query);
				// if ($result->num_rows > 0) {
				// 	// Output data of each row 
				// 	while ($row = $result->fetch_assoc()) {
				// 		echo "Username: " . $row["username"] . " - Password: " . $row["password"] . "<br>";
				// 		//echo "Surname: " . $row["surnamename"] . " - First Name: " . $row["firstname"] . "<br>";
				// 	}
				// } else {
				// 	echo "0 results";
				// }
				// $mysqli->close();

				$stmt = $mysqli->prepare($query);
				if (false === $stmt) {

					trigger_error("Error in query: " . mysqli_connect_error(), E_USER_ERROR);
				} else {

					$stmt->bind_param('ss', $loginid, $password); 
					$stmt->execute();
					$stmt->bind_result($db_username, $db_password);
					//echo db_username;
					$rs = $stmt->fetch();
					if (!$rs) {
						echo "error...S\n";
						echo $query;
						echo $loginid . ' ' . $password;
						// print_r($stmt);
						echo "<script>alert('Invalid Details')</script>";
						header('location:login.php');
					} else {

						header('location:add-course.php');
					}
					$stmt->close();
				}

				$mysqli->close();
			} catch (mysqli_sql_exception $e) {
				print_r($e);
				error_log("MySQL error: " . $e->getMessage());
				trigger_error("Database error: " . $e->getMessage(), E_USER_ERROR);
			} catch (Exception $e) {
				print_r($e);
				error_log("Error: " . $e->getMessage());
				trigger_error("General error: " . $e->getMessage(), E_USER_ERROR);
			}
		}
	}
	function create_course($cshort, $cfull, $cdate)
	{

		if ($cshort == "") {

			echo "<script>alert('Select Course Short Name')</script>";

		} else if ($cfull == "") {

			echo "<script>alert('Select Course Full Name')</script>";

		} else {


			$db = Database::getInstance();
			$mysqli = $db->getConnection();
			$query = "insert into tbl_course(cshort,cfull,cdate)values(?,?,?)";
			$stmt = $mysqli->prepare($query);
			if (false === $stmt) {

				trigger_error("Error in query: " . mysqli_connect_error(), E_USER_ERROR);
			} else {

				$stmt->bind_param('sss', $cshort, $cfull, $cdate);
				$stmt->execute();
				echo "<script>alert('Course Added Successfully')</script>";
				//header('location:login.php');

			}
		}
	}

	function showCourse()
	{

		$db = Database::getInstance();
		$mysqli = $db->getConnection();
		$query = "SELECT * FROM tbl_course ";
		$stmt = $mysqli->query($query);
		return $stmt;

	}

	function showCourse1($cid)
	{

		$db = Database::getInstance();
		$mysqli = $db->getConnection();
		$query = "SELECT * FROM tbl_course  where cid='" . $cid . "'";
		$stmt = $mysqli->query($query);
		return $stmt;

	}

	function showMembers()
	{

		$db = Database::getInstance();
		$mysqli = $db->getConnection();

		// Check if the person table exists
		$checkTableQuery = "SHOW TABLES LIKE 'person'";
		$result = $mysqli->query($checkTableQuery);

		if ($result->num_rows == 0) {
			echo "<script>alert('Person table does not exist. Please create it.')</script>";
			return null; // Return null if the table does not exist
		}

		$query = "SELECT * FROM person ";
		$stmt = $mysqli->query($query);
		return $stmt;

	}


	function showSession()
	{

		$db = Database::getInstance();
		$mysqli = $db->getConnection();
		$query = "SELECT * FROM session  ";
		$stmt = $mysqli->query($query);
		return $stmt;

	}

	function showSubject1($sid)
	{

		$db = Database::getInstance();
		$mysqli = $db->getConnection();
		$query = "SELECT * FROM subject where subid='$sid' ";
		$stmt = $mysqli->query($query);
		return $stmt;

	}

	function create_subject($cshort, $cfull, $sub1, $sub2, $sub3)
	{

		if ($cshort == "") {

			echo "<script>alert('Select  Course Short Name')</script>";

		} else if ($cfull == "") {

			echo "<script>alert('Select  Course Full Name')</script>";

		} else {


			$db = Database::getInstance();
			$mysqli = $db->getConnection();
			$query = "insert into subject(cshort,cfull,sub1,sub2,sub3)values(?,?,?,?,?)";
			$stmt = $mysqli->prepare($query);
			if (false === $stmt) {

				trigger_error("Error in query: " . mysqli_connect_error(), E_USER_ERROR);
			} else {

				$stmt->bind_param('sssss', $cshort, $cfull, $sub1, $sub2, $sub3);
				$stmt->execute();
				echo "<script>alert('Course Added Successfully')</script>";


			}
		}
	}


	function showCountry()
	{

		$db = Database::getInstance();
		$mysqli = $db->getConnection();
		$query = "SELECT * FROM countries ";
		$stmt = $mysqli->query($query);
		return $stmt;

	}
	function showStudents()
	{

		$db = Database::getInstance();
		$mysqli = $db->getConnection();
		$query = "SELECT * FROM registration ";
		$stmt = $mysqli->query($query);
		return $stmt;

	}

	function showStudents1($id)
	{

		$db = Database::getInstance();
		$mysqli = $db->getConnection();
		$query = "SELECT * FROM registration  where id='" . $id . "'";
		$stmt = $mysqli->query($query);
		return $stmt;

	}

	function register(
		$cshort,
		$cfull,
		$fname,
		$mname,
		$lname,
		$gender,
		$gname,
		$ocp,
		$income,
		$category,
		$ph,
		$nation,
		$mobno,
		$email,
		$country,
		$state,
		$city,
		$padd,
		$cadd,
		$board1,
		$board2,
		$roll1,
		$roll2,
		$pyear1,
		$pyear2,
		$sub1,
		$sub2,
		$marks1,
		$marks2,
		$fmarks1,
		$fmarks2,
		$session
	) {

		$db = Database::getInstance();
		$mysqli = $db->getConnection();

		//	echo $session;exit;
		$query = "INSERT INTO `registration` (`course`, `subject`, `fname`, `mname`, `lname`, `gender`, `gname`, `ocp`,
                     `income`, `category`, `pchal`, `nationality`, `mobno`, `emailid`, `country`, `state`, `dist`, 
					 `padd`, `cadd`, `board`, `board1`,`roll`,`roll1`,`pyear`,`yop1`,`sub`,`sub1`,`marks`,`marks1`,
					 `fmarks`,`fmarks1`,`session`,regno) 
                   VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
		$reg = rand();
		$stmt = $mysqli->prepare($query);
		if (false === $stmt) {

			trigger_error("Error in query: " . mysqli_connect_error(), E_USER_ERROR);
		} else {

			$stmt->bind_param(
				'sssssssssssssssssssssssssssssssss',
				$cshort,
				$cfull,
				$fname,
				$mname,
				$lname,
				$gender,
				$gname,
				$ocp,
				$income,
				$category,
				$ph,
				$nation,
				$mobno,
				$email,
				$country,
				$state,
				$city,
				$padd,
				$cadd,
				$board1,
				$board2,
				$roll1,
				$roll2,
				$pyear1,
				$pyear2,
				$sub1,
				$sub2,
				$marks1,
				$marks2,
				$fmarks1,
				$fmarks2,
				$session,
				$reg
			);
			$stmt->execute();
			echo "<script>alert('Successfully Registered , your registration number is $reg')</script>";
			//header('location:login.php');

		}



	}


	function edit_course($cshort, $cfull, $udate, $id)
	{

		$db = Database::getInstance();
		$mysqli = $db->getConnection();
		//echo $cshort.$cfull.$udate.$id;exit;
		$query = "update tbl_course set cshort=?,cfull=? ,update_date=? where cid=?";
		$stmt = $mysqli->prepare($query);
		$stmt->bind_param('sssi', $cshort, $cfull, $udate, $id);
		$stmt->execute();
		echo '<script>';
		echo 'alert("Course Updated Successfully")';
		echo '</script>';

	}


	function edit_subject($sub1, $sub2, $sub3, $udate, $id)
	{

		$db = Database::getInstance();
		$mysqli = $db->getConnection();
		$query = "update subject set sub1=?,sub2=? ,sub3=?,update_date=? where subid=?";
		$stmt = $mysqli->prepare($query);
		$stmt->bind_param('ssssi', $sub1, $sub2, $sub3, $udate, $id);
		$stmt->execute();
		echo '<script>';
		echo 'alert("Subject Updated Successfully")';
		echo '</script>';

	}

	function edit_std(
		$cshort,
		$cfull,
		$fname,
		$mname,
		$lname,
		$gender,
		$gname,
		$ocp,
		$income,
		$category,
		$ph,
		$nation,
		$mobno,
		$email,
		$country,
		$state,
		$city,
		$padd,
		$cadd,
		$board1,
		$board2,
		$roll1,
		$roll2,
		$pyear1,
		$pyear2,
		$sub1,
		$sub2,
		$marks1,
		$marks2,
		$fmarks1,
		$fmarks2,
		$id
	) {
		// echo $id;exit;
		$db = Database::getInstance();
		$mysqli = $db->getConnection();
		$query = "update registration set course=?,subject=?,fname=?,mname=?,lname=?,gender=?,gname=?,ocp=?
              , income=?,category=?,pchal=?,nationality=?,mobno=?,emailid=?,country=?,state=?,dist=?
         	 ,padd=?,cadd=?,board=?,roll=?,pyear=?,sub=?,marks=?,fmarks=?,board1=?,roll1=?,yop1=?,sub1=?
              ,marks1=?,fmarks1=? where id=?";
		//echo $query;
		$stmt = $mysqli->prepare($query);
		if (false === $stmt) {

			trigger_error("Error in query: " . mysqli_connect_error(), E_USER_ERROR);
		}

		$rc = $stmt->bind_param(
			'sssssssssssssssssssssssssssssssi',
			$cshort,
			$cfull,
			$fname,
			$mname,
			$lname,
			$gender,
			$gname,
			$ocp,
			$income,
			$category,
			$ph,
			$nation,
			$mobno,
			$email,
			$country,
			$state,
			$city,
			$padd,
			$cadd,
			$board1,
			$board2,
			$roll1,
			$roll2,
			$pyear1,
			$pyear2,
			$sub1,
			$sub2,
			$marks1,
			$marks2,
			$fmarks1,
			$fmarks2,
			$id
		);

		//echo $rc;
		if (false === $rc) {

			die('bind_param() failed: ' . htmlspecialchars($stmt->error));
		}
		$rc = $stmt->execute();

		if (false == $rc) {
			die('execute() failed: ' . htmlspecialchars($stmt->error));
		} else {
			echo '<script>';
			echo 'alert(" Successfully Updated")';
			echo '</script>';
		}

	}


	function del_course($id)
	{

		//  echo $id;exit;
		$db = Database::getInstance();
		$mysqli = $db->getConnection();
		$query = "delete from tbl_course where cid=?";
		$stmt = $mysqli->prepare($query);
		$stmt->bind_param('s', $id);
		$stmt->execute();
		echo "<script>alert('Course has been deleted')</script>";
		echo "<script>window.location.href='view-course.php'</script>";
	}

	function del_std($id)
	{

		$db = Database::getInstance();
		$mysqli = $db->getConnection();
		$query = "delete from registration where id=?";
		$stmt = $mysqli->prepare($query);
		$stmt->bind_param('i', $id);
		$stmt->execute();
		echo "<script>alert('One record has been deleted')</script>";
		echo "<script>window.location.href='view-course.php'</script>";

	}

	function del_subject($id)
	{


		//echo $id;exit;
		$db = Database::getInstance();
		$mysqli = $db->getConnection();
		$query = "delete from subject where subid=?";
		$stmt = $mysqli->prepare($query);
		$stmt->bind_param('i', $id);
		$stmt->execute();
		echo "<script>alert('Subject has been deleted')</script>";
		// echo "<script>window.location.href='view-course.php'</script>";
	}

	function create_person(
		$member_no,
		$firstname,
		$surname,
		$gender,
		$email,
		$contact1,
		$title = '0',
		$imageUrl = null,
		$maritalStatus = null,
		$nameOfSpouse = null,
		$isYourSpouseAChristian = null,
		$numOfChildren = null,
		$residenceAddress = null,
		$houseNumber = null,
		$residenceLandMark = null,
		$phoneNumber = null,
		$jobStatus = null,
		$nameOfEmployer = null,
		$jobTitle = null,
		$officeContact = null,
		$educationLevel = null,
		$areYouBornAgain = null,
		$dateBornAgain = null,
		$whatIsYourGiftForChristianService = null,
		$dateYouJoinedChurch = null,
		$department = null,
		$whoIntroducedYouToThisChurch = null,
		$membersLivingCloseToYou = null
	) {

		if ($member_no == "" || $firstname == "" || $surname == "" || $gender == "" || $contact1 == "") {
			echo "<script>alert('All fields are required.')</script>";
		} else {
			$db = Database::getInstance();
			$mysqli = $db->getConnection();

			$query = "INSERT INTO person (member_no, firstname, surname, gender, email, contact1, title, 
            imageUrl, maritalStatus, nameOfSpouse, isYourSpouseAChristian, numOfChildren, 
            residenceAddress, houseNumber, residenceLandMark, phoneNumber, jobStatus, 
            nameOfEmployer, jobTitle, officeContact, educationLevel, areYouBornAgain, 
            dateBornAgain, whatIsYourGiftForChristianService, dateYouJoinedChurch, 
            department, whoIntroducedYouToThisChurch, membersLivingCloseToYou,
            isdeleted, isactive, ismember) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 0, 1, 1)";

			$stmt = $mysqli->prepare($query);
			if (false === $stmt) {
				trigger_error("Error in query: " . mysqli_connect_error(), E_USER_ERROR);
			}

			$stmt->bind_param(
				'ssssssssssissssssssssissssss',
				$member_no,
				$firstname,
				$surname,
				$gender,
				$email,
				$contact1,
				$title,
				$imageUrl,
				$maritalStatus,
				$nameOfSpouse,
				$isYourSpouseAChristian,
				$numOfChildren,
				$residenceAddress,
				$houseNumber,
				$residenceLandMark,
				$phoneNumber,
				$jobStatus,
				$nameOfEmployer,
				$jobTitle,
				$officeContact,
				$educationLevel,
				$areYouBornAgain,
				$dateBornAgain,
				$whatIsYourGiftForChristianService,
				$dateYouJoinedChurch,
				$department,
				$whoIntroducedYouToThisChurch,
				$membersLivingCloseToYou
			);

			if ($stmt->execute()) {
				echo "<script>alert('Person Added Successfully')</script>";
			} else {
				echo "<script>alert('Error adding person: " . $stmt->error . "')</script>";
			}
		}
	}

	function get_member_details($member_no)
	{
		$db = Database::getInstance();
		$mysqli = $db->getConnection();
		$query = "SELECT * FROM person WHERE personId = ?";
		$stmt = $mysqli->prepare($query);
		$stmt->bind_param('s', $member_no);
		$stmt->execute();
		$result = $stmt->get_result();
		return $result->fetch_assoc();
	}
	function getMemberById($id)
	{
		$db = Database::getInstance();
		$mysqli = $db->getConnection();
		$query = "SELECT * FROM person WHERE id = ?";
		$stmt = $mysqli->prepare($query);
		$stmt->bind_param('i', $id);
		$stmt->execute();
		$result = $stmt->get_result();
		return $result->fetch_assoc();
	}

}

?>