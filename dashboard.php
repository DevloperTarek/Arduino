<?php 
    session_start();
    if(!isset($_SESSION['isloggedIn'])){
        header('Location:login.php');
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
</head>
<body class="bg-white shadow-md rounded p-4">
    <h1 class="user-data text-3xl uppercase tracking-tide text-center">Wellcome <?php $_SESSION['isloggedIn'] ?> In Our Admin Panel Dashboard.</h1>
    <!-- System Admin Dashboard -->
    <div class="dashboard-wraper-area">
        <div class="dashboard-area">
            <div class="sidebar">
                <ul class="sidebar-unorder-list">
                    <li class="sidebar-order-list">
                        <i class="fas fa-bars"></i>
                        <a href="#">Dashboard</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- System Admin Dashboard -->
    <a href="logout.php">Logout</a>
</body>
</html>