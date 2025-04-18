<?php
// Start session to keep user logged in
session_start();

// Database connection
$conn = new mysqli("localhost", "root", "", "themovies_review");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get values from the form
$email = $_POST['email'];
$password = $_POST['password'];

// Find user by email
$sql = "SELECT * FROM users WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $user = $result->fetch_assoc();
    
    // Check password using password_verify
    if (password_verify($password, $user['password'])) {
     $_SESSION['user'] = $user['username'];
     echo "<script>alert('Login Successful!'); window.location.href='index.html';</script>";
 }else {
        echo "<script>alert('Incorrect password'); window.history.back();</script>";
    }
} else {
    echo "<script>alert('User not found'); window.history.back();</script>";
}

$conn->close();
?>
