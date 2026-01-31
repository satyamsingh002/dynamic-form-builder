<?php
$conn = new mysqli(
  "localhost",
  "root",
  "Satyam@002",
  "form_builder"
);

if ($conn->connect_error) {
  die("DB Error: " . $conn->connect_error);
}
?>
