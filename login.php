<?php
error_reporting(0);
require "init.php";
 
$email = $_POST["email"];
$password = $_POST["password"]; 


$query_get = "SELECT * FROM user_account WHERE accounter_email='".$email."';";
$result = mysqli_query($con, $query_get);
$row = mysqli_fetch_array($result);
$hash_pass = $row['encrypted_password'];
$matching = password_verify($password, $hash_pass);

if($matching){
	$sql = "SELECT * FROM user_account WHERE accounter_email='".$email."' AND encrypted_password='".$hash_pass."';";
 
	$result = mysqli_query($con, $sql);

	$response = array();

	while($resultRow = mysqli_fetch_array($result)){
    	$response = array("ID"=>$resultRow[0],"accounter_name"=>$resultRow[1],"encrypted_password"=>$resultRow[2],"accounter_email"=>$resultRow[3]);
	}
	echo json_encode(array("user_data"=>$response));

} else{

	echo "false";
	
}

?>