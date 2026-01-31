<?php
require_once "../config/db.php";

if (!isset($_GET['id'])) {
  echo json_encode(["error" => "Form ID missing"]);
  exit;
}

$id = $_GET['id'];

$stmt = $conn->prepare("SELECT * FROM forms WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();

$result = $stmt->get_result();

if ($result->num_rows === 0) {
  echo json_encode(["error" => "Form not found"]);
  exit;
}

$form = $result->fetch_assoc();

echo json_encode([
  "id" => $form['id'],
  "title" => $form['title'],
  "description" => $form['description'],
  "fields" => json_decode($form['structure_json'], true),
  "created_at" => $form['created_at']
]);
