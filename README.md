# Laravel 12 Tutorial Project — Authentication & CRUD

This repository is a **continuation** of my Laravel 12 learning journey, following step-by-step lessons to build on the basics learned in the [previous project](https://github.com/rasakmarsawa/laravel).  

In this phase, the focus shifts to **authentication**, **CRUD operations**, and **admin-level features** — bringing the project closer to a real-world Laravel application.

The lessons are based on **Laravel Daily’s _From Scratch_ tutorial series**.

---

## 📚 Lesson Outline

### Authentication and Starter Kits
- **Starter Kits and Using Laravel Breeze** *(7:17)*

### CRUD Operations
- **Categories CRUD**: Index, Create, Update, Delete *(14:21)*
- **Posts CRUD**: Performance and Debugbar *(9:22)*

### Admin & Middleware
- **Admin User Setup**
- **Route Groups and Middleware** *(4:55)*

### Validation
- **Form Validation and Error Messages** *(5:02)*

---

## 🔧 Learning Goals
- Setting up **Laravel Breeze** for authentication (login, register, password reset).
- Implementing **Categories CRUD** with routes, controllers, Blade views, and Eloquent.
- Creating an **Admin user role** with route groups and middleware restrictions.
- Implementing **Posts CRUD** while learning about performance improvements and debugging with **Laravel Debugbar**.
- Adding **form validation** and displaying error messages using Blade components.
- Continuing to practice clean **Git branching workflow**:
  - `master` → production-ready branch  
  - `develop` → active development branch  
  - `feature/*` → isolated feature branches  

---

## 🚀 How to Run (Quick Setup)

1. Clone the repository:
   ```bash
   git clone https://github.com/yourusername/laravel-auth-crud.git
   cd laravel-auth-crud

2. Install dependencies:

   ```bash
   composer install
   npm install && npm run dev

3. Copy .env and run migrations:

   ```bash
   cp .env.example .env
   php artisan key:generate
   php artisan migrate

4. Seed an admin user (optional):

   ```bash
   php artisan db:seed

5. Start the server:

   ```bash
   php artisan serve

6. Then open: http://localhost:8000 🚀

## 🌿 Git Workflow Example
This project continues the same branching strategy:

1. Start from the latest develop branch:

   ```bash
   git checkout develop
   git pull

2. Create a new feature branch:

   ```bash
   git checkout -b feature/categories-crud

3. Commit and merge:

   ```bash
   git add .
   git commit -m "Implement categories CRUD"
   git checkout develop
   git merge feature/categories-crud

4. Release to master when stable:

   ```bash
   Copy code
   git checkout master
   git merge develop

## 📝 Notes
This project is educational and meant for practicing:

    Laravel authentication with Breeze
    CRUD with Eloquent & Blade
    Role-based access control (Admin vs User)
    Performance tools (Debugbar)
    Form validation & error handling
    Git workflows for teamwork

📖 Source
Tutorial source: Laravel Daily — Laravel From Scratch
