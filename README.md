# Polio Drive Management System

This Laravel 10 application is designed to manage the Polio Drive in Pakistan, covering hierarchical administrative units from the provincial level to individual members within households. The system includes user management, role-based access, and the assignment of polio workers to specific union councils.

## Features

- **Hierarchical Administrative Units**: The application manages provinces, divisions, districts, tehsils, and union councils.
- **Role-Based Access**: Two types of users: Admin and Polio Worker.
- **Dynamic Form Population**: Cascading dropdowns for selecting provinces, divisions, districts, tehsils, and union councils.
- **User Management**: Admins can create, edit, and delete users.
- **Assignment Management**: Admins can assign polio workers to specific union councils.
- **Dashboard**: Polio workers can view their profile and assigned union council.

## Installation

1. **Clone the repository**:
   ```bash
   git clone https://github.com/jawadahmed91/laravel-task
   cd laravel-task
   
2.  **Environment setup**:
    
    *   cp .env.example .env
        
    *   Update .env with your database credentials.
        
3.  php artisan key:generate
    
4.  php artisan migrate --seed
    
5.  php artisan serve
    

Usage
-----

### Authentication

*   **Registration**: Admins can register new users, assigning them roles (Admin or Polio Worker).
    
*   **Login**: Users can log in to access the system.
    

### User Management

*   **Admin Role**:
    
    *   View all users.
        
    *   Create, edit, and delete users.
        
    *   Assign polio workers to union councils.
        
*   **Polio Worker Role**:
    
    *   View their profile.
        
    *   View details of their assigned union council.
        

### Dashboard

*   **Polio Worker Dashboard**:
    
    *   Displays the profile of the logged-in polio worker.
        
    *   Shows the assigned union council and related details (tehsil, district, division, province).
        

Seeder Data
-----------

The database is seeded with initial data for provinces, divisions, districts, tehsils, union councils, and users.

### Administrative Units

*   **Provinces**: Sindh
    
*   **Divisions**: Karachi, Hyderabad Sindh
    
*   **Districts**: Latifabad, Qasimabad, Old City
    
*   **Tehsils**: Latifabad # 10
    
*   **Union Councils**: UC-136
    

### Users

ID Name Email Role Password
1 JawadAhmed jawad\_ahmed91@yopmail.com Polio Worker password
2 Faraz faraz@yopmail.com Polio Worker password


### Explanation:
- The **Features** section summarizes the core functionality of the application.
- **Installation** and **Usage** sections guide users through setting up and using the application.
- **Seeder Data** lists the initial data included in the database.
- **Users** section provides details about the seeded users, including their email and password for testing purposes. 
- **License** and **Contributing** sections are standard for open-source projects.

This `README.md` file provides all the essential information for setting up, running, and understanding the Polio Drive Management System.
