<?php

    //db configuration
    require '../dbConfig.php';
	
    //Start session
    session_start(); 

    //print_r($_REQUEST);
    //return;

if(isset($_REQUEST["searchType"]))
{
    $filter =  htmlspecialchars($_REQUEST["searchType"]);
    //echo $filter;
    
	  $query = "SELECT * FROM `person` p
              WHERE `sundayschoolclass` LIKE '%$filter%' 
              OR concat(`surname`, `firstname`, `othernames`) LIKE '%$filter%'
              OR `contact1` LIKE '%$filter%'";
		$result = $dbConn->query($query);
  
		//echo $query;
    //print_r($result); 
    //return;
    
		if ($result != null && $result -> num_rows > 0){
       while($row = $result->fetch_array(MYSQLI_ASSOC)){
        $results[] = $row ;
      }
     // print_r($output);
     // return;

     $output = array(
        "sEcho" => "1", //intval($_GET['sEcho']),
        "iTotalRecords" => count($results),
        "iTotalDisplayRecords" => count($results),
        "aaData" => $results);

        echo json_encode($output);
        
        return;
    }
}
else if(isset($_REQUEST["param"]))
  { 
    $filter =  htmlspecialchars($_REQUEST["param"]);
    //echo $filter;
    
	  $query = " SELECT concat(`firstname`, ' ', TRIM(CASE When (`othernames` is NOT NULL) then `othernames` Else '' End), ' ', `surname`) As FullName, 
    Contact1 AS PrimaryContact,t.month,t.amount 
    FROM `tithe` t
    JOIN `person`p ON p.personid = t.personid
    JOIN lookups l ON p.title = l.value AND l.`lookup#` = 3
    JOIN lookups s ON p.sundayschoolclass = s.value AND s.`lookup#` = 2
    WHERE `member_no` LIKE '%%' AND t.`datecreated` <= CURRENT_DATE() and t.`datecreated` < DATE_Add(CURRENT_DATE, INTERVAL 1 DAY)";

		$result = $dbConn->query($query);
  
		echo $query;
    //print_r($result); 
    //return;
      
		if ($result != null && $result -> num_rows > 0){
      
      $output = array();
      while($row = $result->fetch_array(MYSQLI_ASSOC)) {
          $output[$row["personid"] ."_". $row["SundaySchoolClasses"]."_". $row["Titles"]."_". $row["FullName"]."_". $row["PrimaryContact"]] =  $row["member_no"];
		    
		    } 

   echo json_encode($output);
    return;

    }

  }
     
?>