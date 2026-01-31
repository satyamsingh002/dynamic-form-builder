<?php
require_once "../config/db.php";
$res = $conn->query("SELECT * FROM forms ORDER BY created_at DESC");
?>

<h2>All Forms</h2>

<table border="1" cellpadding="8">
  <tr>
    <th>ID</th>
    <th>Title</th>
    <th>Public Link</th>
    <th>Submissions</th>
  </tr>

  <?php while($f = $res->fetch_assoc()): ?>
  <tr>
    <td><?= $f['id'] ?></td>
    <td><?= $f['title'] ?></td>
    <td>
      <a href="../public/form.php?id=<?= $f['id'] ?>" target="_blank">
        Open Form
      </a>
    </td>
    <td>
      <a href="submissions.php?id=<?= $f['id'] ?>">
        View
      </a>
    </td>
  </tr>
  <?php endwhile; ?>
</table>
