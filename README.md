🎓 Academic Guidance System (Mentor-Mentee)

The Academic Guidance System is a Laravel-based web application designed to facilitate seamless mentorship between faculty members and students. It helps institutions assign mentors to students—especially those with academic challenges—and provides a structured way to monitor student progress, facilitate communication, and maintain mentorship records.

🚀 Features

    🔐 Admin Authentication (Login with Email & Password)
    🌍 Dynamic Address Selection (Country, State, District)
    📉 Data Visualization to display the students attendances
    📉 Automatic Mentee Assignment for students with SGPA below threshold
    🧑‍🏫 Mentor Assignment & Reassignment with duplication checks
    📋 Mentor & Mentee Lists for easy monitoring
    📤 Secure Storage of mentor and mentee login credentials (SHA-256)
    📬 Email-based password reset with OTP verification
    🔍 Advanced Search & Filtering for student, mentor, and mentee records
    📊 Dashboard with Student & Mentor Statistics

🛠️ Built With

    Framework: Laravel 9
    Frontend: Blade, Html, CSS, JavaScript, Bootstrap, jQuery, SweetAlert
    Backend: PHP
    Database: MySQL
    Security: SHA-256 hashing for login credentials

📂 Project Structure Overview

    app/
    ├── Http/
    │   ├── Controllers/
    │   │   └── AdminController.php
    │   │   └── MentorController.php
    │   │   └── StudentController.php
    │
    resources/
    ├── views/
    │   ├── admin/
    │   │   ├── dashboard.blade.php
    │   │   ├── login.blade.php
    │   ├── emails/
    │   │   ├── All email templates blade files
    │   ├── students/
    │   │   ├── index.blade.php
    │   ├── mentor/
    │   │   ├── All mentors blade file
    │   ├── mentees/
    │   │   ├── All mentees blade file
    │
    routes/
    └── web.php
    
    database/
    ├── migrations/
    ├── seeders/

🧪 Installation & Setup

1.Clone the Repository

    git clone https://github.com/ganesh309/Academic_Guidance_System.git
    cd Academic_Guidance_System
    
2.Install Dependencies & Environment Setup

    composer install
    cp .env.example .env
    php artisan key:generate

3.Configure .env

    Check the My Sql file
    Update your database credentials and email settings in .env.

5.Run Migrations

    php artisan migrate

6.Run the Application

    php artisan serve

👨‍💻 Default Admin Credentials

    Email: admin@gmail.com
    Password: Admin@123
    
📸 Screenshots


<img width="952" alt="Screenshot 2025-06-03 150638" src="https://github.com/user-attachments/assets/10a65bef-78bf-40a0-a77a-cdc71edbf735" />

<img width="958" alt="Screenshot 2025-06-03 150718" src="https://github.com/user-attachments/assets/726c20d7-8cea-4c1a-a21b-a0b0af65d547" />

<img width="949" alt="Screenshot 2025-06-03 150750" src="https://github.com/user-attachments/assets/579d0f33-ffb6-4f20-aaf0-276a91bbe826" />

<img width="960" alt="Screenshot 2025-06-03 150813" src="https://github.com/user-attachments/assets/a87f78df-2a89-49dd-9084-41a535a809b5" />

<img width="960" alt="Screenshot 2025-06-03 150838" src="https://github.com/user-attachments/assets/f417d3a4-a071-48dc-ac7b-20918ec162a5" />

<img width="960" alt="Screenshot 2025-06-03 150911" src="https://github.com/user-attachments/assets/49ced766-91e4-41e9-bead-7de892a07073" />

<img width="959" alt="Screenshot 2025-06-03 150936" src="https://github.com/user-attachments/assets/73e93b29-19bc-4d0a-afe2-04d440fb026e" />

<img width="960" alt="Screenshot 2025-06-03 151018" src="https://github.com/user-attachments/assets/fb744409-29ad-4ca9-9b41-e553240e5297" />

<img width="960" alt="Screenshot 2025-06-03 151042" src="https://github.com/user-attachments/assets/d9bc18c0-43c1-4919-88c7-1bbe682d113d" />

<img width="959" alt="Screenshot 2025-06-03 151132" src="https://github.com/user-attachments/assets/dcc7579b-376b-407e-993e-cc95add5cb49" />

<img width="949" alt="Screenshot 2025-06-03 151153" src="https://github.com/user-attachments/assets/ba28d3e1-4104-4874-b78c-fbbc306e2627" />

<img width="957" alt="Screenshot 2025-06-03 151212" src="https://github.com/user-attachments/assets/ffc0b8ff-674a-4932-99b4-4d3c2300a9a5" />

<img width="959" alt="Screenshot 2025-06-03 151227" src="https://github.com/user-attachments/assets/29449ad5-4080-4cd1-9238-16a050a20be4" />

<img width="960" alt="Screenshot 2025-06-03 151258" src="https://github.com/user-attachments/assets/2df1d299-1310-4a7e-9856-48e1da5b3924" />

<img width="957" alt="Screenshot 2025-06-03 151324" src="https://github.com/user-attachments/assets/56bff080-1ff6-4f9e-9470-f05f55b147ba" />

<img width="948" alt="Screenshot 2025-06-03 151356" src="https://github.com/user-attachments/assets/4d9876f7-515f-409e-a2ec-4211bf0129c3" />

<img width="953" alt="Screenshot 2025-06-03 151424" src="https://github.com/user-attachments/assets/2dd464dc-7d30-47c2-a270-c24d4a7c1bb6" />

<img width="945" alt="Screenshot 2025-06-03 151529" src="https://github.com/user-attachments/assets/fd7211c2-9ccb-4904-b6dc-98fe37f0c449" />

<img width="948" alt="Screenshot 2025-06-03 151544" src="https://github.com/user-attachments/assets/ac36182b-0138-4a55-b247-ffa1c15dfbe0" />

<img width="950" alt="Screenshot 2025-06-03 151708" src="https://github.com/user-attachments/assets/a0ba8fea-41b5-42e5-8713-6bc27d9d459d" />



🤝 Contributing

This project was developed collaboratively by our team as part of an academic initiative. Special thanks to all team members for their valuable contributions:

👥 Project Contributors

    [Pratik Saphui] – Frontend Developer / UI Designer
    [Anupam Bardhan] – Frontend Developer / Documentation
    [Ganesh Ghorai] – Backend Developer/Database Design / Data Handling
    [Sankar Rajak] – Backend Developer/Database Design / Data Handling

We collaborated on planning, development, testing, and documentation phases to bring this project to completion.
If you are interested in contributing to the future development of this system, feel free to:

    Fork the repository
    Create a feature branch
    Submit a pull request

We welcome constructive feedback, suggestions, and improvements!

