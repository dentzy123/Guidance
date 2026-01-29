<?php
require_once 'config/database.php';

try {
    // Create admin table if not exists
    $sql = "CREATE TABLE IF NOT EXISTS admin (
        id INT AUTO_INCREMENT PRIMARY KEY,
        email VARCHAR(255) UNIQUE NOT NULL,
        password VARCHAR(255) NOT NULL,
        role VARCHAR(50) DEFAULT 'admin',
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";
    $pdo->exec($sql);

    // Insert admin user
    $email = 'admin@grc.edu';
    $hashedPassword = password_hash('denmar123', PASSWORD_DEFAULT); // Hash for 'denmar123'
    $role = 'admin';

    $stmt = $pdo->prepare("INSERT INTO admin (email, password, role) VALUES (?, ?, ?) ON DUPLICATE KEY UPDATE password = VALUES(password)");
    $stmt->execute([$email, $hashedPassword, $role]);

    echo "Admin account created successfully. Email: admin@grc.edu, Password: denmar123";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
