<?php
// login.php

// Connect to the database
$host = 'localhost';
$user = 'root';
$password = 'Den4083*8879';
$dbname = 'kplc_tokens';

$conn = mysqli_connect($host, $user, $password, $dbname);

if (!$conn) {
	die('Connection failed: ' . mysqli_connect_error());
}

// Check if the form has been submitted
if (isTheseParametersAvailable(array('Username', 'Password'))) {
	// Get the form data
	$Username = mysqli_real_escape_string($conn, $_POST['Username']);
	$Password = mysqli_real_escape_string($conn, $_POST['Password']);

	// Query the database for the user
	$query = "SELECT * FROM users2 WHERE Username = '$Username' AND Password = '$Password'";
	$result = mysqli_query($conn, $query);

	// Check if the user exists
	if (mysqli_num_rows($result) == 1) {
		// Set a session variable to indicate that the user is logged in
		session_start();
		$_SESSION['loggedin'] = true;

		// Redirect the user to the landing page
		header("Location:landing.html");
	} else {
		// Display an error message
		echo '<p>Invalid username or password</p>';
	}
} else {
	echo('Form data not submitted');
}

// Close the database connection
mysqli_close($conn);


//A reusable function to check if any parameters has been passed using POST method
function isTheseParametersAvailable($params){
	foreach ($params as $param) {
		if (!isset($_POST[$param])) {
			return false;
		}
	}
	return true;
}
?>
