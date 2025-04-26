<?php
session_start();

$host = 'localhost';
$db = 'migrant_workers_db';
$user = 'root';
$pass = '';

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$full_name = $_POST['full_name'] ?? '';
$email = $_POST['email'] ?? '';
$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';
$confirm_password = $_POST['confirm_password'] ?? '';

if (!$full_name || !$email || !$username || !$password || !$confirm_password) {
    echo "<script>alert('Please fill in all fields.'); window.history.back();</script>";
    exit();
}

if ($password !== $confirm_password) {
    echo "<script>alert('Passwords do not match.'); window.history.back();</script>";
    exit();
}

$hashed_password = password_hash($password, PASSWORD_DEFAULT);

$sql = "INSERT INTO users (full_name, email, username, password) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssss", $full_name, $email, $username, $hashed_password);

if ($stmt->execute()) {
    echo "<script>alert('Signup successful! You can now log in.'); window.location.href = 'index.html';</script>";
} else {
    echo "<script>alert('Username or email already exists.'); window.history.back();</script>";
}

$conn->close();
?>
