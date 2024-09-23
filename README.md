# XBakery Website

Welcome to the **XBakery**! This project is an online bakery platform built with a focus on efficiency, maintainability, and scalability. The application allows users to browse through various bakery products, place orders, and manage bakery operations.

![main-xbakery](https://github.com/user-attachments/assets/a6fedc92-4fa6-4a86-899e-6c2b5813d643)


## Table of Contents
- [Introduction](#introduction)
- [Technologies Used](#technologies-used)
- [Features](#features)
- [Installation](#installation)
- [Database Structure](#database-structure)
- [Acknowledgments](#acknowledgments)

## Introduction
XBakery is a web application created for bakery shops to help manage their products and customer orders more effectively. The platform includes features for adding, updating, and deleting bakery items, as well as handling customer orders. The goal is to provide a user-friendly experience with efficient database management.

This project illustrates the use of both front-end and back-end technologies, incorporating basic practices to create a functional application suitable for small-scale use.

<p align="center">
  <img src="https://github.com/user-attachments/assets/32aadaf1-094b-48e6-8c49-aecc379c8d25" alt="Cart Order XBakery" width="250" style="margin-right: 20px;"/>
  <img src="https://github.com/user-attachments/assets/7b53684c-52d4-477d-a898-fdfc0a8065d1" alt="Cart Checkout XBakery" width="270" style="margin-right: 20px;"/>
  <img src="https://github.com/user-attachments/assets/ef26850a-364c-4686-bdaa-f5393daf6339" alt="Dashboard Admin XBakery" width="270" />
</p>


## Technologies Used
XBakery employs several technologies and programming languages to create a full-stack application. These include:

### 1. **PHP (Backend)**
   PHP is used to handle server-side logic, such as managing database interactions, handling form submissions, and dynamically generating pages. Its flexibility and large community support make it ideal for building dynamic web applications.

### 2. **MySQL (Database)**
   MySQL is used as the database management system to store information about products, users, and orders. The `Database` class provides methods for performing CRUD operations efficiently, including inserting, updating, deleting, and querying data.

### 3. **HTML, CSS, and JavaScript (Frontend)**
   - **HTML** provides the structure for web pages, organizing content in a semantic way.
   - **CSS** is used to style the application, giving it a visually appealing layout, which is critical for user engagement.
   - **JavaScript** adds interactivity and improves the user experience by enabling features such as form validation and dynamic updates without reloading the page.

### 4. **PDO (PHP Data Objects)**
   PDO is utilized in the `Database` class to interact with the MySQL database. It abstracts database operations and ensures security by preventing SQL injection attacks.

### 5. **MVC Architecture (Model-View-Controller)**
   The project follows the MVC architecture, ensuring a clear separation between logic (Model), presentation (View), and user interaction (Controller). This modularity enhances the maintainability of the codebase and allows for easier scaling.

## Features
- **Product Management**: Admins can add, edit, and delete bakery products.
- **Order Management**: Customers can place orders, and admins can manage them efficiently.
- **Dynamic Interface**: Responsive design ensures the website is accessible on all devices, improving usability.

- **Secure Transactions**: The system is designed with secure database operations to prevent SQL injection and other vulnerabilities.

## Database Structure

The Database class manages CRUD operations through methods like query(), insert(), update(), and delete(). PDO is used for database interactions, enhancing security and performance.

## Installation
To run the XBakery website locally, follow these steps:

1. Clone the repository:
   ```bash
   git clone https://github.com/baotram204/XBakery.git
2. Configure your database by updating the connection settings in the configuration file (config.php):
    ```bash
    $db_config = [
        'host' => 'localhost',
        'dbname' => 'xbakery',
        'user' => 'root',
        'password' => '',
    ];
3. Run the SQL script to set up the database schema and populate initial data.

4. Start the server using a local PHP environment like XAMPP, LARAGON.

5. Access the website by navigating to http://localhost/xbakery.

6. Access the following link http://localhost/xbakery/admin to go to the admin page with username `xiu` and password `123`.
   
## Acknowledgments

The UI images used in this project were sourced from various online resources. While specific links are not available, I appreciate the contributions of the creators and platforms that provided these images.

