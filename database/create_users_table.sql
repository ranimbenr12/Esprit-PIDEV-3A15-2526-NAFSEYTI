-- =============================================
-- Mental Health Platform - Users Table Creation
-- Database: mental_health_platform
-- =============================================

-- Create database if it doesn't exist
CREATE DATABASE IF NOT EXISTS mental_health_platform;

-- Use the database
USE mental_health_platform;

-- Drop table if exists (for fresh start during development)
-- Comment this line if you want to preserve existing data
DROP TABLE IF EXISTS users;

-- Create users table
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    profile_photo VARCHAR(255),
    firstname VARCHAR(20) NOT NULL,
    lastname VARCHAR(20) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    address VARCHAR(30),
    location VARCHAR(30),
    phone_number VARCHAR(20),
    role VARCHAR(20) DEFAULT 'user',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Create index on email for faster lookups
CREATE INDEX idx_email ON users(email);

-- Create index on role for filtering users by role
CREATE INDEX idx_role ON users(role);

-- Insert sample data for testing
INSERT INTO users (firstname, lastname, email, password, address, location, phone_number, role) 
VALUES 
('Admin', 'User', 'admin@mentalhealth.com', 'admin123', '123 Admin St', 'Tunis', '+216-12345678', 'admin'),
('John', 'Doe', 'john.doe@example.com', 'password123', '456 Main St', 'Ariana', '+216-87654321', 'user'),
('Dr. Sarah', 'Smith', 'dr.sarah@mentalhealth.com', 'therapist123', '789 Health Ave', 'La Marsa', '+216-11223344', 'therapist');

-- Display created table structure
DESCRIBE users;

-- Display inserted sample data
SELECT id, firstname, lastname, email, role, created_at FROM users;

-- Success message
SELECT 'Users table created successfully!' AS Status;
