<?php
require_once "../config/db.php";

$id = $_GET['id'];

$res = $conn->query("SELECT * FROM forms WHERE id=$id");
$form = $res->fetch_assoc();

$fields = json_decode($form['structure_json'], true);
?>

<h1><?= $form['title'] ?></h1>
<p><?= $form['description'] ?></p>

<form method="POST" action="submit.php">
  <input type="hidden" name="form_id" value="<?= $id ?>">

  <?php foreach ($fields as $f): ?>
    <label><?= $f['label'] ?></label><br>

    <?php if ($f['type'] == 'text'): ?>
      <input type="text"
        name="<?= $f['label'] ?>"
        <?= $f['required'] ? 'required' : '' ?>>

    <?php elseif ($f['type'] == 'number'): ?>
      <input type="number"
        name="<?= $f['label'] ?>"
        <?= $f['required'] ? 'required' : '' ?>>

    <?php elseif ($f['type'] == 'dropdown'): ?>
      <select name="<?= $f['label'] ?>"
        <?= $f['required'] ? 'required' : '' ?>>
        <?php foreach ($f['options'] as $o): ?>
          <option value="<?= $o ?>"><?= $o ?></option>
        <?php endforeach; ?>
      </select>

    <?php elseif ($f['type'] == 'checkbox'): ?>
      <?php foreach ($f['options'] as $o): ?>
        <label>
          <input type="checkbox"
            name="<?= $f['label'] ?>[]"
            value="<?= $o ?>">
          <?= $o ?>
        </label>
      <?php endforeach; ?>
    <?php endif; ?>

    <br><br>
  <?php endforeach; ?>

  <button type="submit">Submit</button>
</form>
