# Personal Training Management System

> A full-stack web application for managing personal training services — connecting clients, trainers, and admins through a multi-role platform with workout plans, nutrition tracking, real-time chat, and session management.

**Author:** Ziad Hany Mohamed Salem  
**Department:** Cybersecurity  
**Course:** Web Programming  
**Stack:** PHP · MySQL · HTML · CSS  
**Date:** 2026

---

## Features

### Client Portal
- Register and sign in with session-based authentication
- View assigned workout plan and nutrition plan
- Track daily nutrition macros (protein, carbs, fats, calories)
- View workout logs
- Edit profile and reset password
- Real-time chat with assigned trainer

### Trainer Portal
- Trainer sign in with dedicated dashboard
- View and manage assigned clients
- Create and assign workout plans and exercises
- Create and assign nutrition plans and meals
- Log workouts for clients
- View individual client profiles

### Admin Panel
- View and manage all registered clients
- View and manage all trainers
- Full platform oversight

### Architecture Highlights
- **OOP-based PHP backend** — `user`, `trainer`, `client` class hierarchy with inheritance
- **Circular Queue** data structure implemented in PHP for trainer rotation
- **Session management** with login/logout and role-based access control
- **Password reset** flow (two-step)
- **MySQL** relational database backend (`personal_training` schema)

---

## Tech Stack

| Layer | Technology |
|-------|-----------|
| Frontend | HTML, CSS (inline responsive styles) |
| Backend | PHP 8.x (OOP — classes, inheritance, sessions) |
| Database | MySQL via `mysqli` |
| Architecture | Multi-role MVC-style (client / trainer / admin) |
| Data Structure | Circular Queue (PHP) for trainer assignment |

---

## Project Structure

```
personal-training-web-app/
│
├── home_front.php               ← Landing page
├── register.php                 ← User registration
├── client_signin_front.php      ← Client login
├── trainer_signin_front.php     ← Trainer login
├── signin_back.php              ← Authentication logic
│
├── client_dashboard.php         ← Client home — macros, plans overview
├── client_profile.php           ← Client profile view
├── client_view_WorkoutPlan.php  ← View assigned workout plan
├── client_view_NutritionPlan.php← View assigned nutrition plan
├── edit_profile_front.php       ← Edit profile
├── chat_front.php               ← Client-trainer chat
│
├── trainer_dashboard.php        ← Trainer home
├── trainer_client_profile.php   ← View a specific client's profile
├── trainer's_clients.php        ← List of trainer's clients
├── create_workout_plan.php      ← Create a workout plan
├── create_exercise.php          ← Add exercises to a plan
├── create_nutritionPlan.php     ← Create a nutrition plan
├── create_meal.php              ← Add meals to a plan
├── create_workoutlog.php        ← Log a workout session
│
├── admin_dashboard.php          ← Admin overview
├── admin_clients.php            ← Manage all clients
├── admin_trainers.php           ← Manage all trainers
├── admin_login.php              ← Admin login
├── admin_logout.php             ← Admin logout
│
├── user.php                     ← Base User class
├── trainer.php                  ← Trainer class (extends User)
├── client.php                   ← Client class (extends User)
├── workoutLog.php               ← WorkoutLog class
├── nutritionPlan.php            ← NutritionPlan class
├── exercise.php                 ← Exercise class
├── meal.php                     ← Meal class
├── circularQueue.php            ← Circular Queue data structure
│
├── pass_reset1.php              ← Password reset step 1
├── pass_reset2.php              ← Password reset step 2
├── about_front.php              ← About page
├── bundles_front.php            ← Services/bundles page
└── contact_front.php            ← Contact page
```

---

## Class Hierarchy

```
User (base class)
├── Trainer  (extends User)
│   └── viewClients(), viewTrainers(), createWorkoutPlan()...
└── Client   (extends User)
    └── viewWorkoutPlan(), viewNutritionPlan(), viewMacros()...

CircularQueue  ← used for round-robin trainer assignment
WorkoutLog     ← tracks completed sessions
NutritionPlan  ← stores meal plans with macro calculation
```

---

## Database Schema (MySQL)

Key tables in the `personal_training` database:

| Table | Description |
|-------|-------------|
| `CLIENT` | Registered clients with trainer assignment |
| `TRAINER` | Trainer profiles with specialization |
| `WORKOUT_PLAN` | Workout plans assigned to clients |
| `EXERCISE` | Individual exercises per plan |
| `NUTRITION_PLAN` | Nutrition plans assigned to clients |
| `MEAL` | Individual meals with macros (protein, carbs, fats, calories) |
| `WORKOUT_LOG` | Logged workout sessions |
| `CHAT` | Client-trainer chat messages |

---

## Setup & Installation

### Requirements
- PHP 8.x
- MySQL 8.x
- Apache (XAMPP / WAMP / LAMP)

### Steps

```bash
# 1. Clone the repository
git clone https://github.com/ZiadHany99/personal-training-web-app.git

# 2. Move files to your web server root
cp -r personal-training-web-app/ /xampp/htdocs/

# 3. Import the database
# Open phpMyAdmin → Create database 'personal_training' → Import schema

# 4. Configure database connection in config
# Update DB credentials in your local config file (see Security note below)

# 5. Start Apache and MySQL via XAMPP
# Navigate to: http://localhost/personal-training-web-app/home_front.php
```

---

## Security Note

> ⚠️ **Database credentials have been removed from all PHP files before publishing.**  
> The original files contained hardcoded MySQL credentials — these must never be committed to a public repository.  
> Use environment variables or a separate config file (excluded via `.gitignore`) for all database credentials in production.

**Recommended pattern:**
```php
// config.php  (add to .gitignore — never commit this)
define('DB_HOST', 'localhost');
define('DB_USER', 'your_username');
define('DB_PASS', 'your_password');
define('DB_NAME', 'personal_training');
```

---

## Key Learning Outcomes

- Full-stack PHP web development with OOP principles
- Relational database design and MySQL integration via `mysqli`
- Session-based authentication and role-based access control
- Multi-role system design (client / trainer / admin)
- Data structures in web context — Circular Queue for trainer assignment
- Password reset flow and form validation

---

## Disclaimer

This project was developed for academic purposes as part of a Web Programming course. All data used during development was fictional test data.
