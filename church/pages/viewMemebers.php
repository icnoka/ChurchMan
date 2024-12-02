<?php
session_start();

if (!(isset($_SESSION['login']))) {
    header('location:../index.php');
}

include('../config/myFunction.php');
$obj = new DbFunction();

// Get member details if ID is provided
$member = null;
if (isset($_GET['id'])) {
    $member = $obj->getMemberById($_GET['id']);
}

if (!$member) {
    header('location:view-members.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>View Member Details</title>
    <!-- Bootstrap Core CSS -->
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- MetisMenu CSS -->
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <style>
        .detail-label {
            font-weight: bold;
            color: #666;
        }
        .detail-value {
            margin-bottom: 15px;
        }
    </style>
</head>

<body>
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
                        <div class="panel-heading">
                            <h4>Member Details</h4>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="detail-group">
                                        <div class="detail-label">Member No</div>
                                        <div class="detail-value"><?php echo htmlentities($member['member_no']); ?></div>
                                    </div>

                                    <div class="detail-group">
                                        <div class="detail-label">Name</div>
                                        <div class="detail-value">
                                            <?php 
                                            $title = $member['title'] ? $member['title'] . ' ' : '';
                                            echo htmlentities($title . $member['firstname'] . ' ' . $member['surname']); 
                                            ?>
                                        </div>
                                    </div>

                                    <div class="detail-group">
                                        <div class="detail-label">Gender</div>
                                        <div class="detail-value"><?php echo htmlentities($member['gender']); ?></div>
                                    </div>

                                    <div class="detail-group">
                                        <div class="detail-label">Contact Information</div>
                                        <div class="detail-value">
                                            Email: <?php echo htmlentities($member['email']); ?><br>
                                            Phone: <?php echo htmlentities($member['contact1']); ?><br>
                                            Alternative Phone: <?php echo htmlentities($member['phoneNumber']); ?>
                                        </div>
                                    </div>

                                    <div class="detail-group">
                                        <div class="detail-label">Residence Details</div>
                                        <div class="detail-value">
                                            Address: <?php echo htmlentities($member['residenceAddress']); ?><br>
                                            House Number: <?php echo htmlentities($member['houseNumber']); ?><br>
                                            Landmark: <?php echo htmlentities($member['residenceLandMark']); ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="detail-group">
                                        <div class="detail-label">Family Information</div>
                                        <div class="detail-value">
                                            Marital Status: <?php echo htmlentities($member['maritalStatus']); ?><br>
                                            Spouse: <?php echo htmlentities($member['nameOfSpouse']); ?><br>
                                            Spouse Christian: <?php echo htmlentities($member['isYourSpouseAChristian']); ?><br>
                                            Children: <?php echo htmlentities($member['numOfChildren']); ?>
                                        </div>
                                    </div>

                                    <div class="detail-group">
                                        <div class="detail-label">Professional Information</div>
                                        <div class="detail-value">
                                            Job Status: <?php echo htmlentities($member['jobStatus']); ?><br>
                                            Employer: <?php echo htmlentities($member['nameOfEmployer']); ?><br>
                                            Job Title: <?php echo htmlentities($member['jobTitle']); ?><br>
                                            Office Contact: <?php echo htmlentities($member['officeContact']); ?><br>
                                            Education: <?php echo htmlentities($member['educationLevel']); ?>
                                        </div>
                                    </div>

                                    <div class="detail-group">
                                        <div class="detail-label">Church Information</div>
                                        <div class="detail-value">
                                            Born Again: <?php echo htmlentities($member['areYouBornAgain']); ?><br>
                                            Date Born Again: <?php echo htmlentities($member['dateBornAgain']); ?><br>
                                            Joined Church: <?php echo htmlentities($member['dateYouJoinedChurch']); ?><br>
                                            Department: <?php echo htmlentities($member['department']); ?><br>
                                            Christian Service Gift: <?php echo htmlentities($member['whatIsYourGiftForChristianService']); ?><br>
                                            Introduced By: <?php echo htmlentities($member['whoIntroducedYouToThisChurch']); ?>
                                        </div>
                                    </div>

                                    <div class="detail-group">
                                        <div class="detail-label">Nearby Members</div>
                                        <div class="detail-value"><?php echo htmlentities($member['membersLivingCloseToYou']); ?></div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-12">
                                    <a href="edit-member.php?id=<?php echo $member['id']; ?>" class="btn btn-primary">Edit Member</a>
                                    <a href="view-members.php" class="btn btn-default">Back to List</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="../bower_components/jquery/dist/jquery.min.js" type="text/javascript"></script>
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js" type="text/javascript"></script>
    <script src="../dist/js/sb-admin-2.js" type="text/javascript"></script>
</body>
</html>