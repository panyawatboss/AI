<?php include 'config.php';
	$json = file_get_contents('php://input');
	 // decoding the received JSON and store into $obj variable.
	 $obj = json_decode($json,true);
	 // name store into $name.
	$first_name = $obj['first_name'];
	// same with $email.
	$last_name = $obj['last_name'];
	if($obj['first_name']!="")
	{
	$result= $mysqli->query("SELECT * FROM test where first_name='$first_name'");
		if($result->num_rows>0){
			echo json_encode('name already exist');  // alert msg in react native		 		
		}
		else
		{		
		   $add = $mysqli->query("insert into test (first_name,last_name) values('$first_name','$last_name')");
			if($add){
				echo  json_encode('User Registered Successfully'); // alert msg in react native
			}
			else{
			   echo json_encode('check internet connection'); // our query fail 		
			}
		}
	}
	else{
	  echo json_encode('try again');
	}
?>