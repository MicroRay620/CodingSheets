<?php
	// define variables and set to empty values
	$name = $email = $gender = $comment = $website = "";

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$name = test_input($_POST["name"]);
		$email = test_input($_POST["email"]);
		$country = test_input($_POST["country"]);
	  
		// Store data in a separate file (e.g., data.txt)
		$dataFile = fopen("data.txt", "a");
		fwrite($dataFile, "Name: " . $name . "\tEmail: " . $email .  "\tCountry:". $country "\n");
		fclose($dataFile);

		// Optionally, you can redirect to a thank you page
		header("Location: thank_you.html");
		exit();
	}

	function test_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}
?>