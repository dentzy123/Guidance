<?php
session_start();
require_once '../config/auth.php';

if (!is_logged_in() || !is_admin()) {
    header('Location: ../public/login.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Guidance Monitoring System</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        :root {
            --primary-red: #e91e41;
            --dark-red: #c01635;
            --bg-cream: #fdf5e6;
            --text-dark: #333;
            --white: #ffffff;
        }

        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Segoe UI', sans-serif; }

        body { background-color: var(--bg-cream); display: flex; }

        .container { display: flex; width: 100%; min-height: 100vh; }

        /* Sidebar */
        .sidebar { width: 250px; background-color: var(--primary-red); color: white; padding: 20px 0; }
        .logo { padding: 0 20px 30px; font-weight: bold; font-size: 1.2rem; }
        .user-profile { text-align: center; margin-bottom: 30px; }
        .user-profile i { font-size: 40px; margin-bottom: 10px; }

        .nav-links { list-style: none; }
        .nav-links li { padding: 15px 25px; cursor: pointer; transition: 0.3s; }
        .nav-links li.active { background: rgba(255,255,255,0.2); border-radius: 0 25px 25px 0; margin-right: 10px; }
        .nav-links a { color: white; text-decoration: none; display: flex; align-items: center; gap: 15px; }

        /* Main Content */
        .main-content { flex: 1; padding: 20px 40px; }
        .top-header { display: flex; justify-content: flex-end; align-items: center; gap: 20px; color: var(--primary-red); margin-bottom: 30px; }

        .dashboard-banner {
            background-color: var(--primary-red);
            color: white;
            padding: 25px;
            border-radius: 15px;
            margin-bottom: 30px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }

        /* Cards */
        .subject-grid { display: flex; gap: 25px; flex-wrap: wrap; }
        .subject-card {
            background: white;
            width: 350px;
            border-radius: 15px;
            padding: 20px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.05);
            border-top: 5px solid var(--primary-red);
        }

        .card-header { display: flex; gap: 15px; margin-bottom: 40px; }
        .book-icon { background: var(--primary-red); color: white; padding: 10px; border-radius: 8px; }
        .subject-info h3 { font-size: 1.1rem; color: var(--text-dark); }
        .subject-info span { font-size: 0.8rem; color: #888; }

        .card-body { text-align: center; color: #888; }
        .empty-icon { font-size: 50px; margin-bottom: 15px; color: #ddd; }

        .btn-attendance {
            background: var(--primary-red);
            color: white;
            border: none;
            padding: 10px 25px;
            border-radius: 8px;
            margin-top: 20px;
            cursor: pointer;
            font-weight: 600;
        }
        .btn-attendance:hover { background: var(--dark-red); }
    </style>
</head>
<body>
    <div class="container">
        <!-- Sidebar -->
        <div class="sidebar">
            <div class="logo">
                <i class="fas fa-graduation-cap"></i> Guidance System
            </div>
            <div class="user-profile">
                <i class="fas fa-user-circle"></i>
                <p>Admin</p>
            </div>
            <ul class="nav-links">
                <li class="active"><a href="#"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
                <li><a href="manage_users.php"><i class="fas fa-users"></i> Manage Users</a></li>
                <li><a href="attendance_list.php"><i class="fas fa-calendar-check"></i> Attendance</a></li>
                <li><a href="../student-assistant/dashboard.php"><i class="fas fa-user-graduate"></i> Student Assistant</a></li>
                <li><a href="../visitors/visitor_form.php"><i class="fas fa-users"></i> Visitors</a></li>
                <li><a href="../public/logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <div class="top-header">
                <i class="fas fa-cog"></i>
                <i class="fas fa-user-circle"></i>
                <span>Welcome, Admin</span>
            </div>

            <div class="dashboard-banner">
                <h2>Admin Dashboard</h2>
                <p>Manage the Guidance Monitoring System efficiently.</p>
            </div>

            <div class="subject-grid">
                <div class="subject-card">
                    <div class="card-header">
                        <div class="book-icon"><i class="fas fa-users"></i></div>
                        <div class="subject-info">
                            <h3>Manage Users</h3>
                            <span>View and manage user accounts</span>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="empty-icon"><i class="fas fa-users-cog"></i></div>
                        <p>Access user management tools</p>
                        <button class="btn-attendance" onclick="window.location.href='manage_users.php'">Go to Users</button>
                    </div>
                </div>

                <div class="subject-card">
                    <div class="card-header">
                        <div class="book-icon"><i class="fas fa-calendar-check"></i></div>
                        <div class="subject-info">
                            <h3>Attendance</h3>
                            <span>Monitor attendance records</span>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="empty-icon"><i class="fas fa-clipboard-list"></i></div>
                        <p>View attendance lists and reports</p>
                        <button class="btn-attendance" onclick="window.location.href='attendance_list.php'">View Attendance</button>
                    </div>
                </div>

                <div class="subject-card">
                    <div class="card-header">
                        <div class="book-icon"><i class="fas fa-chart-bar"></i></div>
                        <div class="subject-info">
                            <h3>Reports</h3>
                            <span>Generate system reports</span>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="empty-icon"><i class="fas fa-file-alt"></i></div>
                        <p>Access reporting tools</p>
                        <button class="btn-attendance" onclick="window.location.href='#'">Generate Report</button>
                    </div>
                </div>

                <div class="subject-card">
                    <div class="card-header">
                        <div class="book-icon"><i class="fas fa-user-graduate"></i></div>
                        <div class="subject-info">
                            <h3>Student Assistant</h3>
                            <span>Manage student assistant activities</span>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="empty-icon"><i class="fas fa-user-graduate"></i></div>
                        <p>Access student assistant dashboard</p>
                        <button class="btn-attendance" onclick="window.location.href='../student-assistant/dashboard.php'">Go to Student Assistant</button>
                    </div>
                </div>

                <div class="subject-card">
                    <div class="card-header">
                        <div class="book-icon"><i class="fas fa-users"></i></div>
                        <div class="subject-info">
                            <h3>Visitors</h3>
                            <span>Handle visitor registrations</span>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="empty-icon"><i class="fas fa-users"></i></div>
                        <p>Manage visitor forms and records</p>
                        <button class="btn-attendance" onclick="window.location.href='../visitors/visitor_form.php'">Go to Visitors</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
