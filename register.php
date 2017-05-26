<?php
error_reporting(0);
require "init.php";
 
$name = $_POST["name"];
$password = $_POST["password"];
$email = $_POST["email"];

$id = uniqid("", TRUE);
$password = password_hash($password , PASSWORD_DEFAULT);
$sql = "INSERT INTO user_account (ID, accounter_name, accounter_email, encrypted_password) VALUES ( '".$id."', '".$name."', '".$email."', '".$password."');";
if(mysqli_query($con, $sql)){

    echo "true";

}else{

	echo "false";

}	
    
?>