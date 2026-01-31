<!DOCTYPE html>
<html>
<head>
  <title>Admin – Form Builder</title>

  <style>
    * {
      box-sizing: border-box;
    }

    body {
      font-family: 'Segoe UI', Arial, sans-serif;
      background: #f4f6f8;
      padding: 40px;
    }

    .container {
      max-width: 900px;
      margin: auto;
      background: #ffffff;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 10px 25px rgba(0,0,0,0.1);
    }

    h1 {
      margin-top: 0;
      color: #2c3e50;
    }

    .subtitle {
      color: #666;
      margin-bottom: 20px;
    }

    label {
      font-weight: 600;
      display: block;
      margin-top: 15px;
    }

    input[type="text"],
    textarea,
    select {
      width: 100%;
      padding: 10px;
      margin-top: 6px;
      border: 1px solid #ccc;
      border-radius: 6px;
      font-size: 14px;
    }

    textarea {
      resize: vertical;
    }

    #fields > div {
      background: #f9f9f9;
      border: 1px solid #ddd;
      padding: 15px;
      border-radius: 8px;
      margin-top: 15px;
    }

    .actions {
      margin-top: 30px;
      display: flex;
      gap: 15px;
    }

    button {
      padding: 12px 20px;
      font-size: 14px;
      border-radius: 6px;
      border: none;
      cursor: pointer;
    }

    .btn-add {
      background: #3498db;
      color: white;
    }

    .btn-save {
      background: #2ecc71;
      color: white;
    }

    button:hover {
      opacity: 0.9;
    }

    hr {
      margin: 25px 0;
      border: none;
      border-top: 1px solid #ddd;
    }

    .badge {
      display: inline-block;
      background: #eafaf1;
      color: #27ae60;
      padding: 4px 10px;
      border-radius: 20px;
      font-size: 12px;
      margin-left: 10px;
    }
  </style>
</head>

<body>

  <div class="container">

    <h1>
      Admin Panel – Form Builder
      <span class="badge">LIVE</span>
    </h1>

    <p class="subtitle">
      Create dynamic forms with custom fields (Google Forms style).
    </p>

    <hr>

    <label>Form Title</label>
    <input id="formTitle" type="text" placeholder="Enter form title">

    <label>Description</label>
    <textarea id="formDescription" rows="3" placeholder="Describe your form"></textarea>

    <div id="fields"></div>

    <div class="actions">
      <button type="button" class="btn-add" onclick="addField()">➕ Add Field</button>
      <button type="button" class="btn-save" onclick="saveForm()">💾 Save Form</button>
    </div>

  </div>

  <!-- JS -->
  <script src="/form_builder/assets/form-builder.js"></script>

  <script>
    function saveForm() {
  console.log("FIELDS DATA ", fields);

  const title = document.getElementById("formTitle").value;
  const description = document.getElementById("formDescription").value;

  if (!title) {
    alert("Form title is required");
    return;
  }

  fetch("../api/save_form.php", {
    method: "POST",
    headers: { "Content-Type": "application/json" },
    body: JSON.stringify({
      title,
      description,
      fields
    })
  })
  .then(res => res.json())
  .then(() => alert("Saved"));
}

  </script>

</body>
</html>
