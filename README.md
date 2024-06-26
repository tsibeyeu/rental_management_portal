# Rental Portal Application

This Laravel-based Rental Portal application allows users to rent rooms, manage tenants, and provides separate roles and permissions for administrators and regular users.

## Features

- Rent rooms: Users can search for available rooms and rent them based on their preferences.
- Tenant management: Admins can manage tenant information such as name, contact details, and rental history.
- User and admin roles: The application distinguishes between User and Admin roles with different permissions.

## Roles
- **Admin**: Admins have access to administrative features such as managing tenants, adding rooms, and viewing reports.
- **User**: Users can search for rooms, rent them, and manage their profile and rental history.

## Permissions
- **Admin**: 
  - View tenant information
  - Add rooms
  -etc...
  
- **User**:
  - Search for available rooms
  - Rent rooms
  - Manage profile and rental history
  -etc...

## Getting Started

### Prerequisites
- PHP
- Composer
- Laravel

### Installation
1. Clone the repository: 
   ```bash
   git clone <repository_url>

1.Install dependencies:
     composer install
2.Copy the .env.example file and configure your environment variables:
     cp .env.example .env
3.Generate application key:
     php artisan key:generate
4.Run migrations:
     php artisan migrate
5.Serve the application:
    php artisan serve
6.Access the application in your browser at http://localhost:8000.