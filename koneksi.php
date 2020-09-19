<?php
$conn = new mysqli("localhost","root","","kp_companyprofile_kbb");

// Check connection
if ($conn -> connect_errno) {
  echo "Failed to connect to MySQL: " . $conn -> connect_error;
  exit();
}
?>