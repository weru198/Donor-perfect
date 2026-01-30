# Donor Perfect – Donation Tracking System

Donor Perfect is a web-based donation tracking system designed to promote transparency, accountability, and proper management of fundraising campaigns.

The system allows administrators to manage campaigns, record donations, track activities through audit logs, and control access using a login system.

---

## 🚀 Features

- User authentication (login & logout)
- Campaign creation and management
- Donation recording and tracking
- Dynamic campaign–donation relationship
- System audit logs for transparency
- Role-based user structure
- Responsive and simple UI

---

## 🛠️ Technologies Used

- **Frontend:** HTML, CSS, JavaScript  
- **Backend:** PHP  
- **Database:** MySQL  
- **Server:** Apache (XAMPP)  
- **Version Control:** Git & GitHub  

---

## 📂 Project Structure

donor-perfect/
│── index.php
│── login.php
│── logout.php
│── campaigns.php
│── donations.php
│── audit.php
│── save_campaign.php
│── save_donation.php
│── db.php
│── script.js



---

## 🗄️ Database Tables

- `users` – system users and roles
- `campaigns` – fundraising campaigns
- `donations` – donation records
- `audit_logs` – system activity logs

---

## 🔐 Authentication

The system uses PHP sessions to restrict access to authorized users only.  
All protected pages redirect unauthenticated users to the login page.

---

## 🧾 Audit Logging

All critical actions such as:
- Login
- Campaign creation
- Donation recording  

are automatically recorded in the `audit_logs` table.

---

## ⚙️ Installation & Setup

1. Install **XAMPP**
2. Clone or copy the project into:C:\xampp\htdocs\donor-perfect
3. 3. Start **Apache** and **MySQL**
4. Import the database using phpMyAdmin
5. Update database credentials in `db.php`
6. Open browser and visit: http://localhost/donor-perfect/login.php


---

## 👨‍💻 Author

**Evans**  
Diploma in Information Technology  

---

## 📄 License

This project is for academic and learning purposes.


