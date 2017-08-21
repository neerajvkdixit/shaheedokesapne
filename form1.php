<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta http-equiv="cache-control" content="max-age=0" />
	<meta http-equiv="cache-control" content="no-cache" />
	<meta http-equiv="expires" content="0" />
	<meta http-equiv="expires" content="Tue, 01 Jan 1980 1:00:00 GMT" />
	<meta http-equiv="pragma" content="no-cache" />
    <meta name="description" content="shaheedo ke sapne is intiative to collect the information of martyrf fullfill their dreams for which those got martyred" />
    <meta name="author" content="neeraj vk dixit" />
    <meta name="keywords" content="shaheedo ke sapne,शहीदों के सपने,shaheedo ke sapne ka bharat,शहीदों के सपनो का भारत,राजीव दिक्षित,rajiv dixit,जैविक खेती,jaivik kheti,गुरुकुल,gurukul शिक्षा,स्वदेशी शिक्षा,savdeshi shiksha,savdeshi kheti,स्वदेशी खेती,bhagat singh ke sapne,भगत सिंह के सपने,bagat singh,rajguru,sukhdev,राजगुरु,सुखदेव,चन्दर शेखर आज़ाद,नेताजी सुभाष चन्दर बोष,chander sekhar aazad,netaji subhash chander bosh,khudiram bosh,खुदीराम बोष,आयुर्वेदिक चिकित्सा,aayurvedik chikitsha,स्वदेशी अर्थव्यस्था,savdeshi aarthvayvastha,स्वदेशी न्यायव्यवस्था एवं सम्पूर्ण आज़ादी,savdeshi nayayvayvastha avam sampuran aazadi">
    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <title>शहीदों के सपनो का भारत</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    

</head>
<body>
     <?php require 'header.php';?>
     <!-- MENU SECTION END-->
    <div class="content-wrapper">
         <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">जुड़ने वाले की जानकारी भरे </h4>
                
                            </div>

        </div>
             <div class="row">
            
 <div class="col-md-8 col-sm-6 col-xs-12"> 
                <div class="panel panel-danger"> 
                         <div class="panel-heading"> 
                            जुड़ने वाले का फॉर्म 
                         </div> 
                         <div class="panel-body"> 
                             <form id="addvolunteer" action="/submit/apis.php" method="post" role="form"> 
                                   <label style="    margin-left: 25%;">शहीदों के सपनो के लिए काम करने वालो की सुचना </label>     
                                  <div class="form-group"> 
					
                                             <label>जुड़ने वाले का नाम*</label> 
                                             <input name="NAME" class="form-control" id = "j_shaheed_name" type="text" /> </div>
                                             
                                             <div class="form-group">  
                                             <input type="hidden" name="methodcall" value="add_volunteer" />  </div>
											  <br>
											  
											   <div class="form-group">
                                            <label>जानकारी देने वाले  के पिता का नाम</label>
                                            <input name = "FNAME" class="form-control" id = "j_shaheed_fname" type="text" />
                                     <!-- <p class="help-block">Help text here.</p> -->
                                        </div> <br><div class="form-group"> 
                                             <label>जुड़ने वाले का गाँव</label> 
                                             <input name = "VLG" class="form-control" id = "j_shaheed_vlg" type="text" /> </div>
											  <div class="form-group"> 
											  <br>
                                             <label>जुड़ने वाले का जिला*</label> 
                                             <input name = "DISTRICT" class="form-control"  id = "j_shaheed_district" type="text" /> </div>
											  <div class="form-group"> 
											  <br>
                                             <label>जुड़ने वाले का राज्य*</label> 
                                             <input name = "STATE" class="form-control" id = "j_shaheed_state" type="text" />  </div>
											 <div class="form-group"> 
											 <br>
                                             <label>जुड़ने वाले  मोबाइल नंबर*</label> 
                                             <input name = "CONTACT_INFO" class="form-control"  id = "j_shaheed_contact" type="text" />
                                         </div> 

                                     </form> 
                             </div> 
                         </div> 
                             </div> 
        </div>
                                         
                             <input  type="button" class="btn btn-info" id = "add_volunteer_button" style = "margin-left: 40%;margin-top: 1%;    font-size: larger;     font-weight: bolder;
    text-align: center;" value = "जानकारी भेजे"  ></input>
    </div>
    </div>
	</div>
	
	</div>
	</div>
	</div>
	
	<?php require 'footer.php';?>
	
     
    <script src="assets/js/bootstrap.js"></script>
      <!-- CUSTOM SCRIPTS  -->
    <script src="assets/js/custom.js"></script>
    
    <script>
    	$(document).ready(function(){
    	$(".header_page").removeClass("menu-top-active");
    	$("#form_page").addClass("menu-top-active");
    	
    	$("#add_volunteer_button").click(function(){
	       $("#addvolunteer").submit();
	        
	    });
    	
    	
	   // $("#add_volunteer_button").click(function(){
	   //    $("#add_volunteer_button").prop('disabled', true);
	   //    add_volunteer(function(return_val){
	   //    		$("#add_volunteer_button").prop('disabled', false);
	   //    		if(return_val == true)
	   //    			$("#form1")[0].reset();
	   //    });
	       
	       		
	        
	   // });
	});
    
    </script>
    <script src="assets/js/request.js"></script>
</body>
</html>

