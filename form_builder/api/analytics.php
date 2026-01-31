<?php
require_once "../config/db.php";

$form_id = $_GET['id'];
$res = $conn->query(
  "SELECT COUNT(*) as total FROM form_submissions WHERE form_id=$form_id"
);

echo json_encode($res->fetch_assoc());
