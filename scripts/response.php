<?php
// print_r($_REQUEST);
// return;

if(isset($_REQUEST["param"]))
  {
    //db configuration
    require '../dbConfig.php';
	
    //Start session
    session_start(); 

    
    $searchType =  htmlspecialchars($_REQUEST["searchType"]);
    $filter =  htmlspecialchars($_REQUEST["param"]);
    // echo $filter;
    // return;

    if($searchType == "memberNo") {
      $query = "SELECT p.personid, p.member_no, s.Text AS SundaySchoolClass, l.text AS Title, 
      concat(`firstname`, ' ', TRIM(CASE When (`othernames` is NOT NULL) then `othernames` Else '' End), ' ', `surname`) As FullName, 
      Contact1 AS PrimaryContact 
      FROM `person` p
      JOIN lookups l ON p.title = l.value AND l.`lookup#` = 3
      JOIN lookups s ON p.sundayschoolclass = s.value AND s.`lookup#` = 2 
      WHERE `member_no` LIKE '%$filter%'";

		  $result = $dbConn->query($query);

        if ($result != null && $result -> num_rows > 0){
            $output = array();
            while($row = $result->fetch_array(MYSQLI_ASSOC)) {
                $output[$row["personid"] ."_". $row["SundaySchoolClass"]."_". $row["Title"]."_". $row["FullName"]."_". $row["PrimaryContact"]] =  $row["member_no"];
          }

        echo json_encode($output);
        return;

        }
    }
    else{
       $query = "SELECT p.personid, p.member_no, s.Text AS SundaySchoolClass, l.text AS Title, concat(`firstname`, ' ', TRIM(CASE When (`othernames` is NOT NULL) then `othernames` Else '' End), ' ', `surname`) As FullName, Contact1 AS PrimaryContact 
      FROM `person` p
      JOIN lookups l ON p.title = l.value AND l.`lookup#` = 3
      JOIN lookups s ON p.sundayschoolclass = s.value AND s.`lookup#` = 2
      WHERE `member_no` LIKE '%$filter%'";

		  $result = $dbConn->query($query);
      if ($result != null && $result -> num_rows > 0){
        $output = array();
        while($row = $result->fetch_array(MYSQLI_ASSOC)) {
            $output[$row["personid"] ."_". $row["SundaySchoolClass"]."_". $row["Title"]."_". $row["FullName"]."_". $row["PrimaryContact"]] =  $row["FullName"]." - ". $row["PrimaryContact"];
          
          }

      echo json_encode($output);
      return;

      }
    } 
}
 
?>