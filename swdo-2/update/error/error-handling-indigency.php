<?php

// Error handling variables
$backgroundErr = "";

// Indigency Required variables
$background = "";

// Error Counter
$countErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  if (empty($_POST["background"])) {
    $backgroundErr = "This field is REQUIRED";
	$countErr = 1;
  } else {
    $background = indigency_input($_POST["background"]);
  }
  
}

function indigency_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>