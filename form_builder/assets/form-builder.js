let fields = [];

function addField() {
  fields.push({
    label: "",
    type: "text",
    required: false,
    options: []
  });
  renderFields();
}

function renderFields() {
  const container = document.getElementById("fields");
  container.innerHTML = "";

  fields.forEach((f, i) => {
    container.innerHTML += `
      <div style="border:1px solid #ccc; padding:10px; margin-bottom:10px;">
        <input placeholder="Field Label"
          onchange="fields[${i}].label=this.value">

        <select onchange="fields[${i}].type=this.value; renderFields();">
  <option value="text" ${f.type === "text" ? "selected" : ""}>Text</option>
  <option value="number" ${f.type === "number" ? "selected" : ""}>Number</option>
  <option value="dropdown" ${f.type === "dropdown" ? "selected" : ""}>Dropdown</option>
  <option value="checkbox" ${f.type === "checkbox" ? "selected" : ""}>Checkbox</option>
</select>



        <label>
          <input type="checkbox"
            onchange="fields[${i}].required=this.checked">
          Required
        </label>

        ${
          (f.type === "dropdown" || f.type === "checkbox")
          ? `
            <div>
              <button onclick="addOption(${i})">+ Option</button>
              ${f.options.map((o, oi) =>
                `<input placeholder="Option"
                  onchange="fields[${i}].options[${oi}]=this.value">`
              ).join("")}
            </div>
          `
          : ""
        }

        <br>
        <button onclick="deleteField(${i})">Delete Field</button>
      </div>
    `;
  });
}

function addOption(i) {
  fields[i].options.push("");
  renderFields();
}

function deleteField(i) {
  fields.splice(i, 1);
  renderFields();
}



