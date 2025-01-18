<?php
session_start();

if (!(isset($_SESSION['login']))) {
    header('location:../index.php');
}

include('../config/myFunction.php');
$obj = new DbFunction();

if (isset($_GET['member_no'])) {
    $member_no = $_GET['member_no'];
    $memberDetails = $obj->get_member_details($member_no);
} else {
    echo "No member selected.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>View Member</title>
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>

<body>
    <div id="wrapper">
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
                        <div class="panel-heading">Member Details</div>
                        <div class="panel-body">
                            <?php if ($memberDetails): ?>
                                <table class="table table-bordered">
                                    <tr>
                                        <th>Member No</th>
                                        <td><?php echo htmlentities($memberDetails['member_no']); ?></td>
                                    </tr>
                                    <tr>
                                        <th>First Name</th>
                                        <td><?php echo htmlentities($memberDetails['firstname']); ?></td>
                                    </tr>
                                    <tr>
                                        <th>Surname</th>
                                        <td><?php echo htmlentities($memberDetails['surname']); ?></td>
                                    </tr>
                                    <tr>
                                        <th>Gender</th>
                                        <td><?php echo htmlentities($memberDetails['gender']); ?></td>
                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <td><?php echo htmlentities($memberDetails['email']); ?></td>
                                    </tr>
                                    <tr>
                                        <th>Contact 1</th>
                                        <td><?php echo htmlentities($memberDetails['contact1']); ?></td>
                                    </tr>
                                    <tr>
                                        <th>Title</th>
                                        <td><?php echo htmlentities($memberDetails['title']); ?></td>
                                    </tr>
                                    <tr>
                                        <th>Marital Status</th>
                                        <td><?php echo htmlentities($memberDetails['maritalStatus']); ?></td>
                                    </tr>
                                    <tr>
                                        <th>Name of Spouse</th>
                                        <td><?php echo htmlentities($memberDetails['nameOfSpouse']); ?></td>
                                    </tr>
                                    <tr>
                                        <th>Is Your Spouse A Christian?</th>
                                        <td><?php echo htmlentities($memberDetails['isYourSpouseAChristian']); ?></td>
                                    </tr>
                                    <tr>
                                        <th>Number of Children</th>
                                        <td><?php echo htmlentities($memberDetails['numOfChildren']); ?></td>
                                    </tr>
                                    <tr>
                                        <th>Residence Address</th>
                                        <td><?php echo htmlentities($memberDetails['residenceAddress']); ?></td>
                                    </tr>
                                    <tr>
                                        <th>House Number</th>
                                        <td><?php echo htmlentities($memberDetails['houseNumber']); ?></td>
                                    </tr>
                                    <tr>
                                        <th>Residence Landmark</th>
                                        <td><?php echo htmlentities($memberDetails['residenceLandMark']); ?></td>
                                    </tr>
                                    <tr>
                                        <th>Phone Number</th>
                                        <td><?php echo htmlentities($memberDetails['phoneNumber']); ?></td>
                                    </tr>
                                    <tr>
                                        <th>Job Status</th>
                                        <td><?php echo htmlentities($memberDetails['jobStatus']); ?></td>
                                    </tr>
                                    <tr>
                                        <th>Name of Employer</th>
                                        <td><?php echo htmlentities($memberDetails['nameOfEmployer']); ?></td>
                                    </tr>
                                    <tr>
                                        <th>Job Title</th>
                                        <td><?php echo htmlentities($memberDetails['jobTitle']); ?></td>
                                    </tr>
                                    <tr>
                                        <th>Office Contact</th>
                                        <td><?php echo htmlentities($memberDetails['officeContact']); ?></td>
                                    </tr>
                                    <tr>
                                        <th>Education Level</th>
                                        <td><?php echo htmlentities($memberDetails['educationLevel']); ?></td>
                                    </tr>
                                    <tr>
                                        <th>Are You Born Again?</th>
                                        <td><?php echo htmlentities($memberDetails['areYouBornAgain']); ?></td>
                                    </tr>
                                    <tr>
                                        <th>Date Born Again</th>
                                        <td><?php echo htmlentities($memberDetails['dateBornAgain']); ?></td>
                                    </tr>
                                    <tr>
                                        <th>Gift for Christian Service</th>
                                        <td><?php echo htmlentities($memberDetails['whatIsYourGiftForChristianService']); ?></td>
                                    </tr>
                                    <tr>
                                        <th>Date You Joined Church</th>
                                        <td><?php echo htmlentities($memberDetails['dateYouJoinedChurch']); ?></td>
                                    </tr>
                                    <tr>
                                        <th>Department</th>
                                        <td><?php echo htmlentities($memberDetails['department']); ?></td>
                                    </tr>
                                    <tr>
                                        <th>Who Introduced You?</th>
                                        <td><?php echo htmlentities($memberDetails['whoIntroducedYouToThisChurch']); ?></td>
                                    </tr>
                                    <tr>
                                        <th>Members Living Close To You</th>
                                        <td><?php echo htmlentities($memberDetails['membersLivingCloseToYou']); ?></td>
                                    </tr>
                                </table>
                            <?php else: ?>
                                <p>No details found for this member.</p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../bower_components/jquery/dist/jquery.min.js" type="text/javascript"></script>
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js" type="text/javascript"></script>
    <script src="../dist/js/sb-admin-2.js" type="text/javascript"></script>
</body>

</html>