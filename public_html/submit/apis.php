<?php
$servername = "localhost";
$username = "shaheedo_neeraj";
$password = "shaheedokesapne@123";
$dbname = "shaheedo_sks_core";
$port = "3306";

switch ($_SERVER['REQUEST_METHOD'])
{
	
  case 'POST':
      
      
    
    //$requestBody = json_encode($requestBody); $requestBody = json_decode($requestBody);
    
    //$myfile = fopen("newfile.txt", "w") or die("Unable to open file!");
	
	//fwrite($myfile, json_encode($requestBody));
	//fclose($myfile);
    $method_name = $_POST["methodcall"];;
    switch ($method_name)
    {
      case 'add_shaheed':
        add_shaheed();
        break;
      case 'add_volunteer':
        add_volunteer();
        break;

     case 'add_review' : 
        add_review();
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

function add_shaheed ()
{

    global $servername ;
    global $username;
    global $password;
    global $dbname;
    global $port;


    $s_name = $_POST["NAME"];
    $s_fname = $_POST["FNAME"];
    $s_vlg = $_POST["VLG"];
    $s_district = $_POST["DISTRICT"];
    $s_state = $_POST["STATE"];
    $s_contact = $_POST["CONTACT_INFO"];

    $v_name = $_POST["VNAME"];
    $v_fname = $_POST["VFNAME"];
    $v_vlg = $_POST["VVLG"];
    $v_district = $_POST["VDISTRICT"];
    $v_state = $_POST["VSTATE"];
    $v_contact = $_POST["VCONTACT_INFO"];
    

    
    $mysqli = new mysqli($servername,$username , $password, $dbname);
    
    mysqli_set_charset( $mysqli, 'utf8' );
    
    if (mysqli_connect_errno()) {
        $arr = array ('status'=>'fail','text'=>"Connect failed: " . mysqli_connect_error());
        echo json_encode($arr);
        exit(0);
	}
	
	
	$query = "INSERT INTO volunteer_info (NAME ,FNAME , VLG , DISTRICT , STATE ,CONTACT_INFO ) VALUES ('". $v_name ."', '".$v_fname."', '".$v_vlg."', '".$v_district."','".$v_state."','".$v_contact."')";
	
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
	
	$arr = array ('status'=>'success','text'=>'Thank you for your time. shaheed added with id '.$shaheed_id);
    echo json_encode($arr);
    exit(0);
    
    
    //echo "add_shaheed called";
}

function add_volunteer ()
{
    global $servername ;
    global $username;
    global $password;
    global $dbname;
    global $port;


    $v_name = $_POST["NAME"];
    $v_fname = $_POST["FNAME"];
    $v_vlg = $_POST["VLG"];
    $v_district = $_POST["DISTRICT"];
    $v_state = $_POST["STATE"];
    $v_contact = $_POST["CONTACT_INFO"];
    
    
    

    
    $mysqli = new mysqli($servername,$username , $password, $dbname);
    
    mysqli_set_charset( $mysqli, 'utf8' );
    
    if (mysqli_connect_errno()) {
    
    		$arr = array ('status'=>'fail','text'=>"Connect failed: " . mysqli_connect_error());
                echo json_encode($arr);
            exit(0);

	}
	
	
	$query = "INSERT INTO volunteer_info (NAME ,FNAME , VLG , DISTRICT , STATE ,CONTACT_INFO ) VALUES ('". $v_name ."', '".$v_fname."', '".$v_vlg."', '".$v_district."','".$v_state."','".$v_contact."')";
	
	//echo $query;
	
	$mysqli->query($query);
	
	//echo $query;

	//printf ("New Record has id %d.\n", $mysqli->insert_id);
	
	$vol_id = $mysqli->insert_id;
	
	//echo $vol_id;
	//echo $query;
	
	$mysqli->close();
	
	 $arr = array ('status'=>'success','text'=>'Thank you for your time. voluteer added with id '.$vol_id);
        echo json_encode($arr);
        exit(0);
}

function add_review ()
{
    global $servername ;
    global $username;
    global $password;
    global $dbname;
    global $port;



    $s_name = $_POST["NAME"];
    $s_email = $_POST["EMAIL"];
    $s_subject = $_POST["SUBJECT"];
    $s_message = $_POST["MSG"];
    

    
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
	
	$arr = array ('status'=>'success','text'=>'Thank you for your time. REVIEW MESSAGE added with id '.$review_id);
        echo json_encode($arr);
        exit(0);
}

?>
