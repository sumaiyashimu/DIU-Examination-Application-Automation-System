<?php
require_once 'config/db.php';
session_start();
// $error = '';
if (isset($_POST["Loginsubmit"])) {
    [
        'email' => $email,
        'password' => $password,

    ] = $_POST;
    $query = "SELECT * FROM users WHERE email='{$email}' AND password ='{$password}'";
    $userType = (executeQuery($query, 2)['type']);
    $userId = (executeQuery($query, 2)['id']);
    if ($userType == 1) {
        $_SESSION['id'] = $userId;
        $_SESSION['type'] = 1;
        header("Location: student_dash.php");
    } else if ($userType == 2) {
        $_SESSION['id'] = $userId;
        $_SESSION['type'] = 2;
        header("Location: teacher_dash.php");
    } else if ($email == 'afsanaswe@diu.edu.bd' && $password == 'afsana@19') {
        $_SESSION['id'] = 'admin';
        $_SESSION['type'] = 0;
        header("Location: admin_dash.php");
    } else {
        echo "Username or Password is invalid";
      // $error = "Username or Password is invalid";
       
    }
}
?>