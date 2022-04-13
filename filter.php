<html>

<head>
<link rel="stylesheet" href="mystyle.css">
</head>

<script src=  "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js">  </script> 

<?php

session_start();

if($_SESSION["user"]!=1)
	
	{
			header("Location: index.php");		
	}


?>

<div class="topnav">
  <a href="filter.php">Upload Har File</a>
  <a href="view_map.php">View Map</a>
  <a href="edit_profile.php">Edit Profile</a>
  <a href="user_logout.php">Logout </a>
</div>

<br><br><br><br><br><br><br>


<div align="center">
<input type="file" id="file_input" value="Import" /><br>

<br>
<br>
<button  class="button" id="filter_data">Filter Data</button>
</div>
<br>
<br>


<script>

var user_ip;

$.getJSON("https://api.ipify.org?format=json", 
                                          function(data) { 
  
   user_ip = data.ip;
        }) 

document.getElementById('filter_data').onclick = function() {
    var files = document.getElementById('file_input').files;
  
  var myinput = new FileReader();

  myinput.onload = function(inp) { 
  
    var result = JSON.parse(inp.target.result);
	
    var temp = "{\"entries\": [";
	
	var mydata = result['log']['entries'];
	
	for(var i=0;i<mydata.length;i++)
	{
		temp = temp + "{" + "\"startedDateTime\":" +  "\"" + mydata[i]['startedDateTime'] + "\""+ ",";
		
		temp = temp + "\"serverIPAddress\":"+ "\""+ mydata[i]['serverIPAddress']+ "\""+ ",";
		
		temp = temp + "\"timings\": {" + "\"wait\":"+ mydata[i]['timings']['wait'] + "}" + ",";
		
		temp = temp + "\"request\": {" + "\"method\": "  + "\"" + mydata[i]['request']['method'] + "\"" + ",";
		
		temp = temp + "\"url\": " + "\"";
		
		var urlParts = mydata[i]['request']['url'].replace('http://','').replace('https://','').split(/[/?#]/);
		var domain = urlParts[0];

		temp = temp + domain + "\"" + "," + "\"headers\":[";
		
	    var head_req_array = mydata[i]['request']['headers'];
        
		var head_req_total = 0;
		for(var j = 0;j<head_req_array.length;j++)
		
		{
			
		   if(head_req_array[j]['name']=='Content-Type' || head_req_array[j]['name']=='content-type' )
		      
			  {
			   
			   if(head_req_total>=1)
			   {
				   temp = temp + ",";
				   
			   }
			   
			   else
				   
				   {
					   head_req_total = head_req_total + 1;
				   }
				
				  
			  temp = temp + "{" + "\"name\":" + "\"" + head_req_array[j]['name'] + "\"" + "," + "\"value\":" + "\"" + head_req_array[j]['value'] + "\""+ "}";
			  
			    
				  
			  
		      }
			  
	      if(head_req_array[j]['name']=='Cache-Control' || head_req_array[j]['name']=='cache-control'  )
		      
			  {
				  
				  
				  if(head_req_total>=1)
			   {
				   temp = temp + ",";
				   
			   }
			   
			   else
				   
				   {
					   head_req_total = head_req_total + 1;
				   }
				
				  
	   temp = temp + "{" + "\"name\":" + "\"" + head_req_array[j]['name'] + "\"" + "," + "\"value\":" + "\"" + head_req_array[j]['value'] + "\""+ "}";

				  
				  
				  
		      }
			  
		if(head_req_array[j]['name']=='pragma'||head_req_array[j]['name']=='Pragma' )
		      
			  {
				  if(head_req_total>=1)
			   {
				   temp = temp + ",";
				   
			   }
			   
			   else
				   
				   {
					   head_req_total = head_req_total + 1;
				   }
				
				  
		temp = temp + "{" + "\"name\":" + "\"" + head_req_array[j]['name'] + "\"" + "," + "\"value\":" + "\"" + head_req_array[j]['value'] + "\""+ "}";

				  
		      }	

        if(head_req_array[j]['name']=='Expires'||head_req_array[j]['name']=='expires' )
		      
			  {
				  if(head_req_total>=1)
			   {
				   temp = temp + ",";
				   
			   }
			   
			   else
				   
				   {
					   head_req_total = head_req_total + 1;
				   }
				
				  
		temp = temp + "{" + "\"name\":" + "\"" + head_req_array[j]['name'] + "\"" + "," + "\"value\":" + "\"" + head_req_array[j]['value'] + "\""+ "}";

				  
		      }	

        if(head_req_array[j]['name']=='age' || head_req_array[j]['name']=='Age')
		      
			  {
		      
			  if(head_req_total>=1)
			   {
				   temp = temp + ",";
				   
			   }
			   
			   else
				   
				   {
					   head_req_total = head_req_total + 1;
				   }
				
				  
	 temp = temp + "{" + "\"name\":" + "\"" + head_req_array[j]['name'] + "\"" + "," + "\"value\":" + "\"" + head_req_array[j]['value'] + "\""+ "}";

			  
			  
		      }


        if(head_req_array[j]['name']=='last-modified'|| head_req_array[j]['name']=='Last-Modified')
		      
			  {
				  if(head_req_total>=1)
			   {
				   temp = temp + ",";
				   
			   }
			   
			   else
				   
				   {
					   head_req_total = head_req_total + 1;
				   }
				
				  
	   temp = temp + "{" + "\"name\":" + "\"" + head_req_array[j]['name'] + "\"" + "," + "\"value\":" + "\"" + head_req_array[j]['value'] + "\""+ "}";

		      }


        if(head_req_array[j]['name']=='Host'|| head_req_array[j]['name']=='host')
		      
			  {
				  if(head_req_total>=1)
			   {
				   temp = temp + ",";
				   
			   }
			   
			   else
				   
				   {
					   head_req_total = head_req_total + 1;
				   }
				
				  temp = temp + "{" + "\"name\":" + "\"" + head_req_array[j]['name'] + "\"" + "," + "\"value\":" + "\"" + head_req_array[j]['value'] + "\""+ "}";

		      }			  
		
		}
		
		
     temp = temp + "]"+ "}," + "\"response\":{" +"\"status\":" + "\"" + mydata[i]['response']['status'] + "\"" + ",";
		
	temp = temp + "\"statusText\":" + "\"" + mydata[i]['response']['statusText'] + "\""+ "," + "\"headers\":[";
	   
		   
var head_res_array = mydata[i]['response']['headers'];
	   
        
var head_res_total = 0;
	
   for(var k = 0;k<head_res_array.length;k++)
		
		{
		    if(head_res_array[k]['name']=='content-type'||head_res_array[k]['name']=='Content-Type')
		      
			  {
			   
			   if(head_res_total>=1)
			   {
				   temp = temp + ",";
				   
			   }
			   
			   else
				   
				   {
					   head_res_total = head_res_total + 1;
				   }
				
				  
temp = temp + "{"+ "\"name\":"+ "\"" + head_res_array[k]['name'] + "\"" + "," + "\"value\":" + "\"" + head_res_array[k]['value']+ "\""+ "}";
			  
			      
			   }
			  
	      if(head_res_array[k]['name']=='cache-control'|| head_res_array[k]['name']=='Cache-Control')
		      
			  {
			   
			   if(head_res_total>=1)
			   {
				   temp = temp + ",";
				   
			   }
			   
			   else
				   
				   {
					   head_res_total = head_res_total + 1;
				   }
				
				  
	temp = temp + "{"+ "\"name\":"+ "\"" + head_res_array[k]['name'] + "\"" + "," + "\"value\":" + "\"" + head_res_array[k]['value']+ "\""+ "}";

			  
			    
				  
			  
		      }
			  
		if(head_res_array[k]['name']=='pragma'||head_res_array[k]['name']=='Pragma')
		      
			  {
			   
			   if(head_res_total>=1)
			   {
				   temp = temp + ",";
				   
			   }
			   
			   else
				   
				   {
					   head_res_total = head_res_total + 1;
				   }
				
				  
			temp = temp + "{"+ "\"name\":"+ "\"" + head_res_array[k]['name'] + "\"" + "," + "\"value\":" + "\"" + head_res_array[k]['value']+ "\""+ "}";
  
			  
		      }

        if(head_res_array[k]['name']=='expires'|| head_res_array[k]['name']=='Expires')
		      
			  {
			   
			   if(head_res_total>=1)
			   {
				   temp = temp + ",";
				   
			   }
			   
			   else
				   
				   {
					   head_res_total = head_res_total + 1;
				   }
				
				  
	temp = temp + "{"+ "\"name\":"+ "\"" + head_res_array[k]['name'] + "\"" + "," + "\"value\":" + "\"" + head_res_array[k]['value']+ "\""+ "}";
		    
				  
			  
		      }

        if(head_res_array[k]['name']=='age'||head_res_array[k]['name']=='Age')
		      
			  {
			   
			   if(head_res_total>=1)
			   {
				   temp = temp + ",";
				   
			   }
			   
			   else
				   
				   {
					   head_res_total = head_res_total + 1;
				   }
				
				  
	temp = temp + "{"+ "\"name\":"+ "\"" + head_res_array[k]['name'] + "\"" + "," + "\"value\":" + "\"" + head_res_array[k]['value']+ "\""+ "}";

			    
				  
			  
		      }


        if(head_res_array[k]['name']=='last-modified'||head_res_array[k]['name']=='Last-Modified')
		      
			  {
			   
			   if(head_res_total>=1)
			   {
				   temp = temp + ",";
				   
			   }
			   
			   else
				   
				   {
					   head_res_total = head_res_total + 1;
				   }
				
				  
	 temp = temp + "{"+ "\"name\":"+ "\"" + head_res_array[k]['name'] + "\"" + "," + "\"value\":" + "\"" + head_res_array[k]['value']+ "\""+ "}";

				  
			  
		      }

           
		   if(head_res_array[k]['name']=='host'||head_res_array[k]['name']=='Host')
		      
			  {
			   
			   if(head_res_total>=1)
			   {
				   temp = temp + ",";
				   
			   }
			   
			   else
				   
				   {
					   head_res_total = head_res_total + 1;
				   }
				
				  
			   temp = temp + "{"+ "\"name\":"+ "\"" + head_res_array[k]['name'] + "\"" + "," + "\"value\":" + "\"" + head_res_array[k]['value']+ "\""+ "}";

			    				  
			  
		      }
        	  
		
		}


	    temp = temp + "]" + "}" + "}";
		
		if(i!=mydata.length-1)
			
			{
				temp=temp + ",";
			}
		
	}
	
	temp = temp + "]" + "}";
	
	//console.log(temp);
	
    if (confirm("Har Filtered Succesfilly! Do you want to save data to database?IF you press Cancel, data will be saved locally")) {
    
	
	   console.log(user_ip);
  
		 $.ajax({
                url:'save_db.php',
				data: {filtered_data:temp, user_ip: user_ip},

                type:'post',
                
                success:function(response){
					
					alert("Filtered Data saved to DB");

                    				
                }
            });
	
	
	
	
  } 
  
  
  else {
	  
	 $.ajax({
                url:'save_locally.php',
				data: {filtered_data:temp},

                type:'post',
                
                success:function(response){
					
					alert("Filtered Data saved locally");

                    				
                }
            });
	

    
  }
    

  }

  myinput.readAsText(files.item(0));
  
};

</script>

<br>
<br>


</html>