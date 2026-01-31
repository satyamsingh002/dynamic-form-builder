<?php
require_once "../config/db.php";

$form_id = $_GET['id'];
$res = $conn->query(
  "SELECT * FROM form_submissions WHERE form_id=$form_id"
);
?>

<h2>Form Submissions</h2>

<?php while($r = $res->fetch_assoc()): ?>
  <pre><?= json_encode(json_decode($r['response_json']), JSON_PRETTY_PRINT) ?></pre>
  <hr>
<?php endwhile; ?>
