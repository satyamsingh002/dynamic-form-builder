<?php
require_once "../config/db.php";

$data = json_decode(file_get_contents("php://input"), true);

$title = $data['title'];
$description = $data['description'];
$structure = json_encode($data['fields']);

if (isset($_GET['id'])) {
  // UPDATE
  $id = $_GET['id'];
  $stmt = $conn->prepare(
    "UPDATE forms SET title=?, description=?, structure_json=? WHERE id=?"
  );
  $stmt->bind_param("sssi", $title, $description, $structure, $id);
} else {
  // INSERT
  $stmt = $conn->prepare(
    "INSERT INTO forms (title, description, structure_json)
     VALUES (?, ?, ?)"
  );
  $stmt->bind_param("sss", $title, $description, $structure);
}

$stmt->execute();
echo json_encode(["status"=>"success"]);
