function send_request(requestJSON,callback){

	var requestURL = "http://shaheedokesapne.org/submit/apis.php";
	
	var to_return_response = {};

	$.ajax({
                    url : requestURL,
                    data : JSON.stringify(requestJSON),
                    type : "POST",
                    contentType: "application/json; charset=utf-8",
                    async : true,
                    
                    success : function(Response) {
                    	Response = JSON.parse(Response);
                    	if(Response["status"] == "success"){
                        	to_return_response["text"] = "डाटा स्थापित किया गया जिसकी id "+Response["id"] + " है";
                        	to_return_response["status"] = true;
                        }
                        else{
                        	to_return_response["text"] = "1.डाटा किसी त्रुटि की वजह से स्थापित नहीं किया गया "+Response["text"];
                        	to_return_response["status"] = false;
                        	}
                        	callback(to_return_response);	
                    },
                    error : function(xhr, status, error) {
                    to_return_response["text"] = "2.डाटा किसी त्रुटि की वजह से स्थापित नहीं किया गया : "+xhr.responseText + " "+ xhr.statusText + "  status is "+xhr.status.toString() + " error is  "+error  ;
                        	to_return_response["status"] = false;
                        	callback(to_return_response);
                    },
                });
                
        //return to_return_response;


}


function send_request_xhr(requestJSON,callback){
	var http;
	if (window.XMLHttpRequest) {
             // code for IE7+, Firefox, Chrome, Opera, Safari
             http = new XMLHttpRequest();
	}
	else {
	     // code for IE6, IE5
	     http = new ActiveXObject("Microsoft.XMLHTTP");
	}
	var requestURL = "http://shaheedokesapne.org/submit/apis.php";
	var data = JSON.stringify(requestJSON);
	http.open("POST", requestURL, true);
	
	//Send the proper header information along with the request
	http.setRequestHeader("Content-type", "application/json; charset=utf-8");
	
	http.onreadystatechange = function() {//Call a function when the state changes.
	    if(http.readyState == 4 && http.status == 200) {
	        //alert(http.responseText);
	        var to_return_response = {};
	        try {
		    	var Response = JSON.parse(http.responseText);
	            	if(Response["status"] == "success"){
	                	to_return_response["text"] = "डाटा स्थापित किया गया जिसकी id "+Response["id"] + " है";
	                	to_return_response["status"] = true;
	                }
	                else{
		        	to_return_response["text"] = "1.डाटा किसी त्रुटि की वजह से स्थापित नहीं किया गया "+Response["text"];
		        	to_return_response["status"] = false;
	        	}
		}
		catch(err) {
		    		to_return_response["text"] = "2.डाटा किसी त्रुटि की वजह से स्थापित नहीं किया गया "+http.responseText;
		        	to_return_response["status"] = false;
		}
	        
        	callback(to_return_response);
	        
	    }else if(http.readyState == 4){
	    	var to_return_response = {};
	    	to_return_response["text"] = "3.डाटा किसी त्रुटि की वजह से स्थापित नहीं किया गया : "+http.statusText + " status code is " + http.status.toString();
        	to_return_response["status"] = false;
        	callback(to_return_response);
            	console.log("Error", http.statusText);
            	console.log("Error", http.status); 
	    	
	    }
	}
	http.send(data);

}


function add_review(callback){

	
	var s_name = $("#s_name").val();
	var s_email = $("#s_email").val();
	var s_subject = $("#s_subject").val();
	var s_data = $("#s_data").val();
	
	
	var send_data = {
	
	"method" : "add_review",
	"s_name" : s_name,
	"s_email" : s_email,
	"s_subject" : s_subject,
	"s_data" : s_data,

	}
	
	send_request(send_data,function(response){
	
		alert(response["text"]);
	
		callback(response["status"]);
	});
	
	
	

}

function add_volunteer(callback){

	
	var j_shaheed_name = $("#j_shaheed_name").val();
	var j_shaheed_fname = $("#j_shaheed_fname").val();
	var j_shaheed_vlg = $("#j_shaheed_vlg").val();
	var j_shaheed_district = $("#j_shaheed_district").val();
	var j_shaheed_state = $("#j_shaheed_state").val();
	var j_shaheed_contact = $("#j_shaheed_contact").val();
	
	
	var send_data = {
	
	"method" : "add_volunteer",
	"j_shaheed_name" : j_shaheed_name,
	"j_shaheed_fname" : j_shaheed_fname,
	"j_shaheed_vlg" : j_shaheed_vlg,
	"j_shaheed_district" : j_shaheed_district,
	"j_shaheed_state" : j_shaheed_state,
	"j_shaheed_contact" : j_shaheed_contact
	
	
	}
	
	send_request(send_data,function(response){
		alert(response["text"]);
	
		callback(response["status"]);
	
	});
	

}

function add_shaheed(callback){

	var shaheed_name = $("#shaheed_name").val();
	var shaheed_fname = $("#shaheed_fname").val();
	var shaheed_vlg = $("#shaheed_vlg").val();
	var shaheed_district = $("#shaheed_district").val();
	var shaheed_state = $("#shaheed_state").val();
	var shaheed_contact = $("#shaheed_contact").val();
	
	var j_shaheed_name = $("#j_shaheed_name").val();
	var j_shaheed_fname = $("#j_shaheed_fname").val();
	var j_shaheed_vlg = $("#j_shaheed_vlg").val();
	var j_shaheed_district = $("#j_shaheed_district").val();
	var j_shaheed_state = $("#j_shaheed_state").val();
	var j_shaheed_contact = $("#j_shaheed_contact").val();
	
	
	var send_data = {
	
	"method" : "add_shaheed",
	"shaheed_name" : shaheed_name,
	"shaheed_fname" : shaheed_fname,
	"shaheed_vlg" : shaheed_vlg,
	"shaheed_district" : shaheed_district,
	"shaheed_state" : shaheed_state,
	"shaheed_contact" : shaheed_contact,
	"j_shaheed_name" : j_shaheed_name,
	"j_shaheed_fname" : j_shaheed_fname,
	"j_shaheed_vlg" : j_shaheed_vlg,
	"j_shaheed_district" : j_shaheed_district,
	"j_shaheed_state" : j_shaheed_state,
	"j_shaheed_contact" : j_shaheed_contact
	
	
	}
	
	send_request(send_data,function(response){
		alert(response["text"]);
	
		callback(response["status"]);
	});
	

}