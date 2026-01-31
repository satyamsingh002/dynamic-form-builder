# Dynamic Form Builder (Google Forms Lite)

A web-based dynamic form builder similar to Google Forms, where an admin can create custom forms dynamically and users can submit responses through a public link.  
Form structures and user responses are stored dynamically using JSON in a MySQL database.

---

## 🚀 Features

### Admin Panel
- Create dynamic forms with:
  - Form title and description
  - Multiple field types:
    - Text
    - Number
    - Dropdown
    - Checkbox
  - Required / Optional fields
  - Options for dropdown and checkbox fields
- Add, edit, and delete fields dynamically
- Update existing forms (Edit Form feature)
- View all created forms
- View user submissions for each form

### Public User Side
- Publicly accessible form link (e.g. `/public/form.php?id=1`)
- Forms generated dynamically from database JSON
- Client-side and server-side validation
- Submit responses easily

### Data Handling
- Dynamic form structure stored as JSON
- User responses stored as JSON
- Each submission linked to its form
- Clean separation of admin and user functionality

### Bonus / Extra
- Modular API endpoints (`get_form.php`, `save_form.php`)
- Prepared statements to prevent SQL Injection
- Clean project structure
- Easily extendable for analytics and charts

---

## 🛠 Tech Stack

- **Frontend:** HTML, CSS, Vanilla JavaScript  
- **Backend:** Core PHP  
- **Database:** MySQL  
- **Server:** XAMPP (Apache + MySQL)  
- **Version Control:** Git & GitHub  

---

## 📁 Project Structure

form_builder/
├── admin/
│ ├── create-form.php
│ ├── edit-form.php
│ ├── forms-list.php
│ └── submissions.php
│
├── api/
│ ├── get_form.php
│ ├── save_form.php
│ └── analytics.php
│
├── public/
│ ├── form.php
│ └── submit.php
│
├── assets/
│ └── form-builder.js
│
├── config/
│ └── db.php
│
├── database.sql
└── README.md


---

## 🗄 Database Design

### Table: `forms`
Stores form definitions dynamically.

| Column | Type | Description |
|------|------|------------|
| id | INT | Primary key |
| title | VARCHAR | Form title |
| description | TEXT | Form description |
| structure_json | JSON | Dynamic form fields |
| created_at | DATETIME | Creation time |

### Table: `form_submissions`
Stores user responses.

| Column | Type | Description |
|------|------|------------|
| id | INT | Primary key |
| form_id | INT | Linked form ID |
| response_json | JSON | User responses |
| submitted_at | DATETIME | Submission time |

---

## ⚙️ Setup Instructions

### 1️⃣ Clone / Download Project
Place the project inside:


### 2️⃣ Start Server
- Open **XAMPP Control Panel**
- Start **Apache** and **MySQL**

### 3️⃣ Database Setup
- Open `http://localhost/phpmyadmin`
- Import `database.sql`
- This will create:
  - `form_builder` database
  - `forms` table
  - `form_submissions` table

### 4️⃣ Database Configuration
Edit `config/db.php` if needed:

```php
$conn = new mysqli("localhost", "root", "YOUR_PASSWORD", "form_builder");

5️⃣ Run the Project

- Admin Panel:
   http://localhost/form_builder/admin/create-form.php

- Public Form:
   http://localhost/form_builder/public/form.php?id=FORM_ID
 
 
🧪 How It Works
1. Admin creates a form using the Admin Panel
2. Form structure is saved as JSON in the database
3. A public link is generated for the form
4. Users fill and submit the form
5. Responses are stored as JSON submissions
6. Admin can view all submissions


🔐 Security Practices
1. Prepared statements used to prevent SQL Injection
2. Input validation on client and server side
3. No hardcoded form fields (fully dynamic system)

📈 Future Enhancements
1. Form analytics dashboard (charts)
2. CSV export of submissions
3. Admin authentication
4. Drag-and-drop field reordering

5. Mobile-first responsive UI
