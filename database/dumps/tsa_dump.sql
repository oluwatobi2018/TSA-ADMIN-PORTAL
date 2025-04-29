-- Create database
CREATE DATABASE IF NOT EXISTS tsa_db;
USE tsa_db;

-- Drop existing tables if needed
DROP TABLE IF EXISTS users;
DROP TABLE IF EXISTS contacts;

-- Create 'users' table
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    full_name VARCHAR(100) NOT NULL,
    contact_number VARCHAR(20),
    email VARCHAR(100) NOT NULL UNIQUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Insert sample users
INSERT INTO users (username, password, full_name, contact_number, email) VALUES
('admin1', '$2y$10$K9MZpHfM9DjEtrQvZf6loOEa0rOfY2FIfx/Vaa2D69VGuYJlABVgW', 'Admin One', '08012345678', 'admin1@example.com'),
('john_doe', '$2y$10$4T91A9z8e3zM3EjxFM04feKRvCGmj3vCXPfFHKfkN4aGVVfb1T8Ia', 'John Doe', '08123456789', 'john@example.com');

-- Note: These passwords are bcrypt-hashed ('password123', 'secret123')

-- Create 'contacts' table
CREATE TABLE contacts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    name VARCHAR(100) NOT NULL,
    phone VARCHAR(20),
    email VARCHAR(100),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

-- Insert sample contacts
INSERT INTO contacts (user_id, name, phone, email) VALUES
(2, 'Jane Smith', '09098765432', 'jane.smith@example.com'),
(2, 'David Johnson', '08054321098', 'david.j@example.com');
