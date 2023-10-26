#!/bin/bash

# Database credentials
DB_USER="your_username"
DB_PASSWORD="your_password"
DB_NAME="your_database_name"

# Table structure and new items data
SQL_FILE="reset_database.sql"

# Create a SQL script file to reset the database
cat > "$SQL_FILE" << EOF
-- Drop existing table
DROP TABLE IF EXISTS your_table_name;

-- Recreate the table with your desired structure
CREATE TABLE your_table_name (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    description TEXT
);

-- Insert new items
INSERT INTO your_table_name (name, description) VALUES
    ('Item 1', 'Description for Item 1'),
    ('Item 2', 'Description for Item 2'),
    ('Item 3', 'Description for Item 3');
EOF

# Use the MySQL command to execute the SQL script
mysql -u "$DB_USER" -p"$DB_PASSWORD" "$DB_NAME" < "$SQL_FILE"

# Clean up the SQL script file
rm "$SQL_FILE"

echo "Database reset and populated with new items."

# IMPORTANT FILE