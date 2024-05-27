# Contact Manager Web Application

This is a simple Contact Manager web application built using PHP with an MVC (Model-View-Controller) architecture. It demonstrates advanced object-oriented programming concepts, including dependency injection, factory patterns, and dynamic form generation.

# Features
#### 1. Add, view, edit, and delete contacts

#### 2. Dynamic form generation

#### 3. MVC architecture

## Setup Instructions

### 1. Clone the Repository.

```bash
git clone https://github.com/jeetsoni07/content-manager.git
cd content-manager
```

### 2. Install Dependencies
```bash
composer install
```

### 3. Database Setup
```bash
CREATE DATABASE contact_manager;
USE contact_manager;

CREATE TABLE contacts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    phone_number VARCHAR(20) NOT NULL,
    email VARCHAR(100) NOT NULL,
    address TEXT NOT NULL
);
```

### 4. Configure Database Connection
```bash
Edit the src/config/database.php file to include your database credentials:
```

### 5. Access the Application
```bash
Open your browser and navigate to http://localhost/Contact-manager/public/index.php.

Note: this URL is for xampp user you can change path accordiong your server
```
### Architecture and Design Patterns

The application follows the MVC pattern:

#### Model: 
Represents the data and the business logic. The Contact class in src/models/Contact.php handles database interactions.
#### View: 
Responsible for rendering the UI. Views are located in src/views/contacts/.
#### Controller: 
Handles user input and interacts with the model. The ContactController class in src/controllers/ContactController.php manages requests and responses.

#### Dependency Injection
Dependency injection is used to provide the database connection to the Contact model, enhancing testability and maintainability.

#### Factory Pattern
The ConnectionFactory class in src/factories/ConnectionFactory.php is used to create database connection instances, encapsulating the creation logic and promoting code reuse.

#### Dynamic Form Generation
The application uses a dynamic form generation approach for creating and editing contacts. This is achieved using the Form class and various field classes in src/models/fields/.