-- Create the users table
CREATE TABLE IF NOT EXISTS users (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    name TEXT NOT NULL,
    email TEXT NOT NULL UNIQUE,
    password TEXT NOT NULL,
    created_at TEXT DEFAULT CURRENT_TIMESTAMP,
    updated_at TEXT DEFAULT CURRENT_TIMESTAMP
);

-- Insert three user records
INSERT INTO users (name, email, password, created_at, updated_at) VALUES
('Alice', 'alice@example.com', 'password123', '2024-05-26 12:00:00', '2024-05-26 12:00:00'),
('Bob', 'bob@example.com', 'password456', '2024-05-26 12:05:00', '2024-05-26 12:05:00'),
('Charlie', 'charlie@example.com', 'password789', '2024-05-26 12:10:00', '2024-05-26 12:10:00');
