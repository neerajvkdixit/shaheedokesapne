<?php
$servername = "localhost";
$username = "shaheedo_neeraj";
$password = "shaheedokesapne@123";
$dbname = "shaheedo_sks_core";
$port = "3306";

switch ($_SERVER['REQUEST_METHOD'])
{
	
  case 'POST':
    
    $requestBody = file_get_contents('php://input');
    $requestBody = json_decode($requestBody, true) or die("Could not decode JSON");
    
    //$requestBody = json_encode($requestBody); $requestBody = json_decode($requestBody);
    
    //$myfile = fopen("newfile.txt", "w") or die("Unable to open file!");
	
	//fwrite($myfile, json_encode($requestBody));
	//fclose($myfile);
    $method_name = $requestBody["method"];
    switch ($method_name)
    {
      case 'add_shaheed':
        add_shaheed($requestBody);
        break;
      case 'add_volunteer':
        add_volunteer($requestBody);
        break;

     case 'add_review' : 
        add_review($requestBody);
        break;

        
      default:
       // 405 = Method Not Allowed
       http_response_code(405); // for PHP >= 5.4.0
       exit;
    }
    
    
  case 'GET':
    //echo "inside get";
    
    if (isset($_GET["action"]) ) {
    	switch ($_GET["action"])
	    {
	    	case 'download':
	    		
	            $file_name = $_GET["file_name"];
	            $file_name = base64_decode($file_name);
	            $path = $_SERVER['DOCUMENT_ROOT'] . $file_name ;
	            //echo  $_SERVER['DOCUMENT_ROOT'];
	            //exit();
	    	    header('Content-Description: File Transfer');
		    header('Content-Type: application/force-download');
		    header("Content-Disposition: attachment; filename=\"" . basename($file_name) . "\";");
		    header('Content-Transfer-Encoding: binary');
		    header('Expires: 0');
		    header('Cache-Control: must-revalidate');
		    header('Pragma: public');
		    header('Content-Length: ' . filesize($file_name));
		    ob_clean();
		    flush();
		    readfile($path); //showing the path to the server where the file is to be download
		    exit;
	        	break;
	
	        
	      default:
	       // 405 = Method Not Allowed
	       http_response_code(405); // for PHP >= 5.4.0
	       exit;
	    }
    
    
       
	}else{  
	    echo "N0, mail is not set";
	}


    
    
    break;
  default:
   // 405 = Method Not Allowed
   http_response_code(405); // for PHP >= 5.4.0
   exit;
}

function add_shaheed ($data)
{

global $servername ;
global $username;
global $password;
global $dbname;
global $port;



    $s_name = $data["shaheed_name"];$s_fname = $data["shaheed_fname"];$s_vlg = $data["shaheed_vlg"];$s_district = $data["shaheed_district"];$s_state = $data["shaheed_state"];$s_contact = $data["shaheed_contact"];
    $j_name = $data["j_shaheed_name"];$j_fname = $data["j_shaheed_fname"];$j_vlg = $data["j_shaheed_vlg"];$j_district = $data["j_shaheed_district"];$j_state = 				$data["j_shaheed_state"];$j_contact = $data["j_shaheed_contact"];
    

    
    $mysqli = new mysqli($servername,$username , $password, $dbname);
    
    mysqli_set_charset( $mysqli, 'utf8' );
    
    if (mysqli_connect_errno()) {
    
    		$arr = array ('status'=>'fail','text'=>"Connect failed: " . mysqli_connect_error());

    		echo json_encode($arr);
	    exit(0);
	}
	
	
	$query = "INSERT INTO volunteer_info (NAME ,FNAME , VLG , DISTRICT , STATE ,CONTACT_INFO ) VALUES ('". $j_name ."', '".$j_fname."', '".$j_vlg."', '".$j_district."','".$j_state."','".$j_contact."')";
	
	$mysqli->query($query);
	
	//echo $query;

	//printf ("New Record has id %d.\n", $mysqli->insert_id);
	
	$vol_id = $mysqli->insert_id;
	
	//echo $vol_id;
	
	
	$query = "INSERT INTO shaheed_info (NAME ,FNAME , VLG , DISTRICT , STATE ,CONTACT_INFO ,VOL_ID) VALUES ('". $s_name ."', '".$s_fname."', '".$s_vlg."', '".$s_district."','".$s_state."','".$s_contact."',".$vol_id.")";
	
	//echo $query;
	
	
	$mysqli->query($query);
	
	$shaheed_id = $mysqli->insert_id;
	
	$mysqli->close();
	
	$arr = array ('status'=>'success','id'=>$shaheed_id);

    	echo json_encode($arr);
    	
    	exit(0);
    
    
    //echo "add_shaheed called";
}

function add_volunteer ($data)
{
    global $servername ;
global $username;
global $password;
global $dbname;
global $port;



    $s_name = $data["shaheed_name"];$s_fname = $data["shaheed_fname"];$s_vlg = $data["shaheed_vlg"];$s_district = $data["shaheed_district"];$s_state = $data["shaheed_state"];$s_contact = $data["shaheed_contact"];
    $j_name = $data["j_shaheed_name"];$j_fname = $data["j_shaheed_fname"];$j_vlg = $data["j_shaheed_vlg"];$j_district = $data["j_shaheed_district"];$j_state = 				$data["j_shaheed_state"];$j_contact = $data["j_shaheed_contact"];
    

    
    $mysqli = new mysqli($servername,$username , $password, $dbname);
    
    mysqli_set_charset( $mysqli, 'utf8' );
    
    if (mysqli_connect_errno()) {
    
    		$arr = array ('status'=>'fail','text'=>"Connect failed: " . mysqli_connect_error());

    		echo json_encode($arr);
	    exit(0);
	}
	
	
	$query = "INSERT INTO volunteer_info (NAME ,FNAME , VLG , DISTRICT , STATE ,CONTACT_INFO ) VALUES ('". $j_name ."', '".$j_fname."', '".$j_vlg."', '".$j_district."','".$j_state."','".$j_contact."')";
	
	//echo $query;
	
	$mysqli->query($query);
	
	//echo $query;

	//printf ("New Record has id %d.\n", $mysqli->insert_id);
	
	$vol_id = $mysqli->insert_id;
	
	//echo $vol_id;
	//echo $query;
	
	$mysqli->close();
	
	$arr = array ('status'=>'success','id'=>$vol_id);

    	echo json_encode($arr);
    	
    	exit(0);
}

function add_review ($data)
{
    global $servername ;
global $username;
global $password;
global $dbname;
global $port;



    $s_name = $data["s_name"];$s_email = $data["s_email"];$s_subject = $data["s_subject"];$s_message = $data["s_data"];
    

    
    $mysqli = new mysqli($servername,$username , $password, $dbname);
    
    mysqli_set_charset( $mysqli, 'utf8' );
    
    if (mysqli_connect_errno()) {
    
    		$arr = array ('status'=>'fail','text'=>"Connect failed: " . mysqli_connect_error());

    		echo json_encode($arr);
	    exit(0);
	}
	
	
	$query = "INSERT INTO shaheed_review_message (SENDER_NAME ,SENDER_EMAIL , SUBJECT , MESSAGE  ) VALUES ('". $s_name ."', '".$s_email."', '".$s_subject."', '".$s_message."')";
	
	$mysqli->query($query);
	
	//echo $query;

	//printf ("New Record has id %d.\n", $mysqli->insert_id);
	
	$review_id = $mysqli->insert_id;
	
	//echo $vol_id;
	//echo $query;
	
	$mysqli->close();
	
	$arr = array ('status'=>'success','id'=>$review_id);

    	echo json_encode($arr);
    	
    	exit(0);
}

?>