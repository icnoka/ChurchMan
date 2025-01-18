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
        header("Location: membersearch.php");
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

    <title>COP | Memeber Search</title>

    <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap-Datepicker -->
    <link href="vendors/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-wysiwyg -->
    <link href="vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">
    <!-- Select2 -->
    <link href="vendors/select2/dist/css/select2.min.css" rel="stylesheet">
    <!-- Switchery -->
    <link href="vendors/switchery/dist/switchery.min.css" rel="stylesheet">
    <!-- starrr -->
    <link href="vendors/starrr/dist/starrr.css" rel="stylesheet">

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
                            <h3>Search <small>Member</small></h3>
                        </div>
                        <div class="title_right">
                            <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search for...">
                                    <span class="input-group-btn">
                                    <button class="btn btn-default" type="submit">Search</button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="row">
                        <div class="x_panel">
                            <div class="x_title">
                                <!-- <h2>Search <small>Member</small></h2> -->
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

                                <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Add Member</button>
						
  <!-- Modal -->
  <div class="modal fade bs-example-modal-lg" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add Member</h4>
        </div>
        <div class="modal-body">
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
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>                                <div class="table-responsive">
                                    <table id="TitheGrid" class="table table-striped jambo_table bulk_action">
                                        <thead>
                                            <tr class="headings">
                                                <!-- <th>
                                                    <input type="checkbox" id="check-all" class="flat">
                                                </th> -->
                                                <th class="column-title">Member Number </th>
                                                <th class="column-title">First Name </th>
                                                <th class="column-title">Surname </th> 
                                                <th class="column-title">Birth Date </th>
                                                <th class="column-title">Mobile </th>
                                                <th class="column-title no-link last"><span class="nobr">Email</span>
                                                </th>
                                                <!-- <th class="bulk-actions" colspan="7">
                                                    <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                                                </th> -->
                                            </tr>
                                        </thead>

                                        <!-- <tbody>
                                            <tr class="even pointer"> -->
                                                <!-- <td class="a-center ">
                                                    <input type="checkbox" class="flat" name="table_records">
                                                </td> -->
                                                 <!--<td class=" ">121000040</td>
                                                <td class=" ">Isaac </td>
                                                <td class=" ">Aryee <i class="success fa fa-long-arrow-up"></i></td> -->
                                                <!-- <td class=" ">01/03/2001</td>
                                                <td class=" ">0244439988</td>
                                                <td class="a-right a-right ">isaac@email.com</td> -->
                                                <!-- <td class=" last"><a href="#">View</a> -->
                                                <!-- </td>
                                            </tr>
                                            <tr class="odd pointer"> -->
                                                <!-- <td class="a-center ">
                                                    <input type="checkbox" class="flat" name="table_records">
                                                </td> -->
                                                <!-- <td class=" ">121000041</td>
                                                <td class=" ">Koffie </td>
                                                <td class=" ">Ampomah <i class="success fa fa-long-arrow-up"></i></td>
                                                <td class=" ">03/03/1993</td>
                                                <td class=" ">0244439988</td>
                                                <td class="a-right a-right ">isaac@email.com</td> -->
                                                <!-- <td class=" last"><a href="#">View</a> -->
                                                <!-- </td>
                                                </td>
                                            </tr>
                                           
                                            <tr class="even pointer"> -->
                                                <!-- <td class="a-center ">
                                                    <input type="checkbox" class="flat" name="table_records">
                                                </td> -->
                                               <!-- <td class=" ">121000042</td>
                                                <td class=" ">Jemima </td>
                                                <td class=" ">Aquaye <i class="success fa fa-long-arrow-up"></i></td>
                                                <td class=" ">01/03/1997</td>
                                                <td class=" ">0244439988</td>
                                                <td class="a-right a-right ">jem@email.com</td>-->
                                                <!-- <td class=" last"><a href="#">View</a> -->
                                                <!-- </td>
                                                </td>
                                            </tr>
                                            <tr class="odd pointer"> -->
                                                <!-- <td class="a-center ">
                                                    <input type="checkbox" class="flat" name="table_records">
                                                </td> -->
                                                <!-- <td class=" ">121000043</td>
                                                <td class=" ">Ama </td>
                                                <td class=" ">Brown <i class="success fa fa-long-arrow-up"></i></td>
                                                <td class=" ">16/07/2006</td>
                                                <td class=" ">0244439988</td>
                                                <td class="a-right a-right ">ama@email.com</td> -->
                                                <!-- <td class=" last"><a href="#">View</a> -->
                                                <!-- </td>
                                                </td>
                                            </tr>
                                        </tbody> -->
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
            </form>
        </div>
    </div>
     <!-- footer content -->
        <footer>
          <div class="pull-right">
            COP  - Church App <a href="https://colorlib.com">ICAM</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
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
    <!-- Datatables -->
    <script src="vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="vendors/datatables.net-scroller/js/datatables.scroller.min.js"></script>
    <script src="vendors/jszip/dist/jszip.min.js"></script>
    <script src="vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="vendors/pdfmake/build/vfs_fonts.js"></script>
   
    <!-- bootstrap-progressbar -->
    <script src="vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="vendors/iCheck/icheck.min.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="js/moment/moment.min.js"></script>

    <script src="js/datepicker/daterangepicker.js"></script> 
    <!-- bootstrap-datepicker -->
    <script src="vendors/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
  
    <!-- bootstrap-wysiwyg -->
    <script src="vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
    <script src="vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
    <script src="vendors/google-code-prettify/src/prettify.js"></script>
    <!-- jQuery Tags Input -->
    <script src="vendors/jquery.tagsinput/src/jquery.tagsinput.js"></script>
    <!-- Switchery -->
    <script src="vendors/switchery/dist/switchery.min.js"></script>
    <!-- Select2 -->
    <script src="vendors/select2/dist/js/select2.full.min.js"></script>
    <!-- Parsley -->
    <script src="vendors/parsleyjs/dist/parsley.min.js"></script>
    <!-- Autosize -->
    <script src="vendors/autosize/dist/autosize.min.js"></script>
    <!-- jQuery autocomplete -->
    <script src="vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
    <!-- starrr -->
    <script src="vendors/starrr/dist/starrr.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="build/js/custom.min.js"></script>
    
    <script>
      // var table = $('#TitheGrid').DataTable();
      // $('#TitheGrid tbody').on( 'click', 'tr', function () {
      //      var d = table.row( this ).data();
      //       //d.counter++;
      //       alert(d);
      //       // table
      //       // .row( this )
      //       // .data( d )
      //       // .draw();
      //   });
    $(document).ready(function () {
        debugger;

        $.ajax({
              url:"scripts/memberlogic.php",
              type:"POST",
              contenttype:"application/x-www-form-urlencoded",
              data:{
                  param:"",
                  searchType:""
              },
              success:function(result){
                debugger;
               var  data = JSON.parse(result).aaData;
                //console.log(data);
                console.log(data);

             var table = $('#TitheGrid').DataTable( {
                    data: data,
                    destroy: true,
                    dom: 'Bfrtip',
                    Select: true,
                    buttons: [
                                'copy', 'excel', 'pdf',
                                {
                                    //extend: "selectedSingle",
                                    text: "Salary +250",
                                    action: function ( e, dt, node, config ) {
                                      debugger;
                                        var d = table.row( this ).data();
                                        //d.counter++;
                                        alert(d);
                                        // // Immediately add `250` to the value of the salary and submit
                                        // editor
                                        //     .edit( table.row( { selected: true } ).index(), false )
                                        //     .set( 'salary', (editor.get( 'salary' )*1) + 250 )
                                        //     .submit();
                                    }
                                },
                                //{ extend: "create"},
                                //{ extend: "edit",   editor: editor },
                                //{ extend: "remove", editor: editor }
                            ],
                    columns: [
                      { "data": "member_no" },
                      { "data": "firstname" },
                      { "data": "surname" },
                      { "data": "birthdate" },
                      { "data": "contact1" },
                      { "data": "email" },
                    ]
                });
                },
                error:function(error){
                debugger;
              
              }
             
          });
         
       /* $('#TitheGrid').dataTable({
            "processing": true,
            "serverSide": true, 
            datasource
            
            "columns": [
                { mData: 'amount' },
                { mData: 'FullName' },
                { mData: 'PrimaryContact' }
            ]
        });*/
    });

    // Autosize --> 
      $(document).ready(function() {
        autosize($('.resizable_textarea'));
        $("#month").datepicker( {
            format: "MM yyyy",
            startView: "months", 
            minViewMode: "months"
        });

      }); 
    // /Autosize -->

    // jQuery autocomplete -->  
      $(document).ready(function() {

var countries; //= { AD:"Andorra",A2:"Andorra Test",AE:"United Arab Emirates",AF:"Afghanistan",AG:"Antigua and Barbuda",AI:"Anguilla",AL:"Albania",AM:"Armenia",AN:"Netherlands Antilles",AO:"Angola",AQ:"Antarctica",AR:"Argentina",AS:"American Samoa",AT:"Austria",AU:"Australia",AW:"Aruba",AX:"Åland Islands",AZ:"Azerbaijan",BA:"Bosnia and Herzegovina",BB:"Barbados",BD:"Bangladesh",BE:"Belgium",BF:"Burkina Faso",BG:"Bulgaria",BH:"Bahrain",BI:"Burundi",BJ:"Benin",BL:"Saint Barthélemy",BM:"Bermuda",BN:"Brunei",BO:"Bolivia",BQ:"British Antarctic Territory",BR:"Brazil",BS:"Bahamas",BT:"Bhutan",BV:"Bouvet Island",BW:"Botswana",BY:"Belarus",BZ:"Belize",CA:"Canada",CC:"Cocos [Keeling] Islands",CD:"Congo - Kinshasa",CF:"Central African Republic",CG:"Congo - Brazzaville",CH:"Switzerland",CI:"Côte d’Ivoire",CK:"Cook Islands",CL:"Chile",CM:"Cameroon",CN:"China",CO:"Colombia",CR:"Costa Rica",CS:"Serbia and Montenegro",CT:"Canton and Enderbury Islands",CU:"Cuba",CV:"Cape Verde",CX:"Christmas Island",CY:"Cyprus",CZ:"Czech Republic",DD:"East Germany",DE:"Germany",DJ:"Djibouti",DK:"Denmark",DM:"Dominica",DO:"Dominican Republic",DZ:"Algeria",EC:"Ecuador",EE:"Estonia",EG:"Egypt",EH:"Western Sahara",ER:"Eritrea",ES:"Spain",ET:"Ethiopia",FI:"Finland",FJ:"Fiji",FK:"Falkland Islands",FM:"Micronesia",FO:"Faroe Islands",FQ:"French Southern and Antarctic Territories",FR:"France",FX:"Metropolitan France",GA:"Gabon",GB:"United Kingdom",GD:"Grenada",GE:"Georgia",GF:"French Guiana",GG:"Guernsey",GH:"Ghana",GI:"Gibraltar",GL:"Greenland",GM:"Gambia",GN:"Guinea",GP:"Guadeloupe",GQ:"Equatorial Guinea",GR:"Greece",GS:"South Georgia and the South Sandwich Islands",GT:"Guatemala",GU:"Guam",GW:"Guinea-Bissau",GY:"Guyana",HK:"Hong Kong SAR China",HM:"Heard Island and McDonald Islands",HN:"Honduras",HR:"Croatia",HT:"Haiti",HU:"Hungary",ID:"Indonesia",IE:"Ireland",IL:"Israel",IM:"Isle of Man",IN:"India",IO:"British Indian Ocean Territory",IQ:"Iraq",IR:"Iran",IS:"Iceland",IT:"Italy",JE:"Jersey",JM:"Jamaica",JO:"Jordan",JP:"Japan",JT:"Johnston Island",KE:"Kenya",KG:"Kyrgyzstan",KH:"Cambodia",KI:"Kiribati",KM:"Comoros",KN:"Saint Kitts and Nevis",KP:"North Korea",KR:"South Korea",KW:"Kuwait",KY:"Cayman Islands",KZ:"Kazakhstan",LA:"Laos",LB:"Lebanon",LC:"Saint Lucia",LI:"Liechtenstein",LK:"Sri Lanka",LR:"Liberia",LS:"Lesotho",LT:"Lithuania",LU:"Luxembourg",LV:"Latvia",LY:"Libya",MA:"Morocco",MC:"Monaco",MD:"Moldova",ME:"Montenegro",MF:"Saint Martin",MG:"Madagascar",MH:"Marshall Islands",MI:"Midway Islands",MK:"Macedonia",ML:"Mali",MM:"Myanmar [Burma]",MN:"Mongolia",MO:"Macau SAR China",MP:"Northern Mariana Islands",MQ:"Martinique",MR:"Mauritania",MS:"Montserrat",MT:"Malta",MU:"Mauritius",MV:"Maldives",MW:"Malawi",MX:"Mexico",MY:"Malaysia",MZ:"Mozambique",NA:"Namibia",NC:"New Caledonia",NE:"Niger",NF:"Norfolk Island",NG:"Nigeria",NI:"Nicaragua",NL:"Netherlands",NO:"Norway",NP:"Nepal",NQ:"Dronning Maud Land",NR:"Nauru",NT:"Neutral Zone",NU:"Niue",NZ:"New Zealand",OM:"Oman",PA:"Panama",PC:"Pacific Islands Trust Territory",PE:"Peru",PF:"French Polynesia",PG:"Papua New Guinea",PH:"Philippines",PK:"Pakistan",PL:"Poland",PM:"Saint Pierre and Miquelon",PN:"Pitcairn Islands",PR:"Puerto Rico",PS:"Palestinian Territories",PT:"Portugal",PU:"U.S. Miscellaneous Pacific Islands",PW:"Palau",PY:"Paraguay",PZ:"Panama Canal Zone",QA:"Qatar",RE:"Réunion",RO:"Romania",RS:"Serbia",RU:"Russia",RW:"Rwanda",SA:"Saudi Arabia",SB:"Solomon Islands",SC:"Seychelles",SD:"Sudan",SE:"Sweden",SG:"Singapore",SH:"Saint Helena",SI:"Slovenia",SJ:"Svalbard and Jan Mayen",SK:"Slovakia",SL:"Sierra Leone",SM:"San Marino",SN:"Senegal",SO:"Somalia",SR:"Suriname",ST:"São Tomé and Príncipe",SU:"Union of Soviet Socialist Republics",SV:"El Salvador",SY:"Syria",SZ:"Swaziland",TC:"Turks and Caicos Islands",TD:"Chad",TF:"French Southern Territories",TG:"Togo",TH:"Thailand",TJ:"Tajikistan",TK:"Tokelau",TL:"Timor-Leste",TM:"Turkmenistan",TN:"Tunisia",TO:"Tonga",TR:"Turkey",TT:"Trinidad and Tobago",TV:"Tuvalu",TW:"Taiwan",TZ:"Tanzania",UA:"Ukraine",UG:"Uganda",UM:"U.S. Minor Outlying Islands",US:"United States",UY:"Uruguay",UZ:"Uzbekistan",VA:"Vatican City",VC:"Saint Vincent and the Grenadines",VD:"North Vietnam",VE:"Venezuela",VG:"British Virgin Islands",VI:"U.S. Virgin Islands",VN:"Vietnam",VU:"Vanuatu",WF:"Wallis and Futuna",WK:"Wake Island",WS:"Samoa",YD:"People's Democratic Republic of Yemen",YE:"Yemen",YT:"Mayotte",ZA:"South Africa",ZM:"Zambia",ZW:"Zimbabwe",ZZ:"Unknown or Invalid Region" };

          // $.ajax({
          //     url:"scripts/response.php",
          //     type:"POST",
          //     contenttype:"application/x-www-form-urlencoded",
          //     data:{
          //         param:"",
          //         searchType:""
          //     },
          //     success:function(result){
          //       //debugger;
          //       //alert(result);
          //       countries = JSON.parse(result);
          //       console.log(JSON.parse(result));
          //       console.log(countries);
 
          //           var countriesArray = $.map(countries, function(value, key) {
          //               return {
          //                   value: value,
          //                   data: key
          //               };
          //           });

          //           // initialize autocomplete with custom appendTo
          //           $('#autocomplete-custom-append').autocomplete({
          //           lookup: countriesArray,
          //           appendTo: '#autocomplete-container',
          //           onSelect:function(sugguestion){
          //               debugger;
          //               var txt = sugguestion.data.split('_');
          //               var personId = txt[0];
          //               var sundaySchoolClass = txt[1];
          //               var title = txt[2];
          //               var fullName = txt[3];
          //               var primaryContact = txt[4];
          //               $('#PersonId').val(personId); //alert($('#PersonId').val());
          //               $('#SundaySchoolClass').html(sundaySchoolClass);
          //               $('#Title').html(title);
          //               $('#FullName').html(fullName);
          //               $('#PhoneNumber').html(primaryContact);
          //           }
          //           });

          //     },
          //     error:function(error){
          //       debugger;
              
          //     }
              
          // });
        

      }); 
    //jQuery autocomplete -->

    
</script>
</body>

</html>