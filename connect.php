<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


if (isTheseParamentersAvailable(array('Full_Name', 'Username', 'Email', 'Phone_Number', 'Gender', 'Password'))) {


	$Full_Name = $_POST['Full_Name'];
	$Username = $_POST['Username'];
	$Email = $_POST['Email'];
	$Phone_Number = $_POST['Phone_Number'];
	$Gender = $_POST['Gender'];
	$Password = $_POST['Password'];
	

	// Database connection
	$conn = new mysqli('localhost','root','Den4083*8879','kplc_tokens');
	if($conn->connect_error){
		die("Connection Failed: " . $conn->connect_error);}
		// Process form data if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $Full_Name = $_POST['Full_Name'];
    $Username = $_POST['Username'];
	$Email = $_POST['Email'];
	$Phone_Number = $_POST['Phone_Number'];
    $Gender = $_POST['Gender'];
    $Password = $_POST['Password'];}
    

    // Hash the password for security
    $hashedPassword = password_hash($Password, PASSWORD_DEFAULT);
		$stmt = $conn->prepare("insert into users2(Full_Name, Username, Email, Phone_Number, Gender, Password) values(?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("ssssss", $Full_Name, $Username, $Email, $Phone_Number, $Gender,  $Password, );
		if($stmt->execute()) {
			echo "Registration successfull...";
		} else {
			echo "Error: " . $stmt->error;
		}

}		
		
		$stmt->close();
		$conn->close();



function isTheseParamentersAvailable($params){
	foreach ($params as $param) {
		if (!isset($_POST[$param])) {
			return false;
		}
	}
	return true;
}		

?>