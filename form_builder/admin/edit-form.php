<?php
require_once "../config/db.php";

$id = $_GET['id'];
$res = $conn->query("SELECT * FROM forms WHERE id=$id");
$form = $res->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
  <title>Edit Form</title>
</head>
<body>

<h2>Edit Form</h2>

<input id="formTitle" value="<?= htmlspecialchars($form['title']) ?>"><br><br>
<textarea id="formDescription"><?= htmlspecialchars($form['description']) ?></textarea>

<div id="fields"></div>

<button type="button" onclick="saveForm()">Update Form</button>

<script>
let fields = <?= $form['structure_json'] ?>;
</script>

<script src="/form_builder/assets/form-builder.js"></script>

<script>
function saveForm() {
  fetch("../api/save_form.php?id=<?= $id ?>", {
    method: "POST",
    headers: { "Content-Type": "application/json" },
    body: JSON.stringify({
      title: document.getElementById("formTitle").value,
      description: document.getElementById("formDescription").value,
      fields: fields
    })
  })
  .then(() => alert("Form updated successfully ✅"));
}

renderFields(); 
</script>

</body>
</html>
