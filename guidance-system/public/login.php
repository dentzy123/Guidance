<?php
session_start();
require_once '../config/auth.php';

$error = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    if (login($email, $password)) {
        if (is_admin()) {
            header('Location: ../admin/dashboard.php');
        } else {
            header('Location: ../public/index.php');
        }
        exit;
    } else {
        $error = 'Invalid email or password';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Guidance Monitoring System</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<style>
* {
    box-sizing: border-box;
    font-family: 'Segoe UI', Tahoma, sans-serif;
}

body {
    margin: 0;
    min-height: 100vh;
    background: linear-gradient(135deg, #ffd6d6, #ffe7c9);
    display: flex;
    align-items: center;
    justify-content: center;
}

/* MAIN CARD */
.container {
    width: 900px;
    max-width: 95%;
    background: #fff;
    border-radius: 18px;
    display: flex;
    box-shadow: 0 25px 60px rgba(0,0,0,0.15);
    overflow: hidden;
}

/* LEFT PANEL */
.left {
    width: 50%;
    background: linear-gradient(160deg, #c4163a, #e11d48);
    color: #fefefe;
    padding: 50px 40px;
    
}

.left h2 {
    font-size: 28px;
    margin-bottom: 15px;
    font-weight: bold;
    padding: 40px;
    text-align: center;
    
}

.left p {
    opacity: 0.95;
    margin-bottom: 35px;
}

.features {
    list-style: none;
    padding: 0;
}

.features li {
    margin-bottom: 18px;
    display: flex;
    align-items: center;
    gap: 10px;
    font-size: 15px;
}

.feature {
            display: flex;
            align-items: ;
            margin-bottom: 15px;
            font-size: 0.9rem;
            position: relative;
            top: 100px;
            
        }

/* RIGHT PANEL */
.right {
    width: 50%;
    padding: 50px 45px;
}

.right h2 {
    font-size: 28px;
    margin-bottom: 8px;
    text-align: center;
}

.right p {
    color: #666;
    margin-bottom: 30px;
    text-align: center;
}

.form-group {
    margin-bottom: 18px;
}

label {
    font-size: 14px;
    display: block;
    margin-bottom: 6px;
}

input {
    width: 100%;
    padding: 13px 15px;
    border-radius: 10px;
    border: 1px solid #f2b8b8;
    background: #fff1dc;
    font-size: 15px;
}

input:focus {
    outline: none;
    border-color: #e11d48;
}

button {
    width: 100%;
    padding: 14px;
    border-radius: 12px;
    border: none;
    background: #e11d48;
    color: #fff;
    font-size: 16px;
    cursor: pointer;
    margin-top: 10px;
}

button:hover {
    background: #be123c;
}

.links {
    text-align: center;
    margin-top: 18px;
    font-size: 14px;
}

.links a {
    color: #e11d48;
    text-decoration: none;
}

.error {
    background: #fee2e2;
    color: #991b1b;
    padding: 10px;
    border-radius: 8px;
    margin-bottom: 15px;
    font-size: 14px;
}

/* RESPONSIVE */
@media (max-width: 768px) {
    .container {
        flex-direction: column;
    }
    .left, .right {
        width: 100%;
    }
}
</style>
</head>

<body>

<div class="container">

    <!-- LEFT SIDE -->
    <div class="left">
        
        <h2>Guidance Monitoring System</h2>
        
        <div class="feature">
                    <span class="feature-icon">📚</span>
                    <span>Mision/Vision</span>
        </div>

    </div>

    
    <!-- RIGHT SIDE -->
    <div class="right">
        <img src="../assets/assetsimages/grc logo.png" alt="GRC Logo" style="display: block; margin: 0 auto 15px; width: 150px;">
        <h2>Welcome Back</h2>
        <p>Sign in to your Guidance Monitoring System account</p>

        <?php if ($error): ?>
            <div class="error"><?php echo $error; ?></div>
        <?php endif; ?>

        <form method="POST">
            <div class="form-group">
                <label>Email Address</label>
                <input type="email" name="email" placeholder="Enter your email address" required>
            </div>

            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" placeholder="Enter your password" required>
            </div>

            <button type="submit">Sign In</button>
        </form>

        <div class="links">
            <p>Don't have an account? <a href="#">Create account</a></p>
        </div>
    </div>

</div>

</body>
</html>
