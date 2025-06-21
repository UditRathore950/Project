<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit;
}

$conn = new mysqli("localhost", "root", "", "login");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$email = $_SESSION['email'];
$number = $_POST['number'];
$address = $_POST['address'];

$stmt = $conn->prepare("UPDATE users SET number = ?, address = ? WHERE email = ?");
$stmt->bind_param("sss", $number, $address, $email);

if ($stmt->execute()) {
    header("Location: myorders.php?updated=1");
    exit;
} else {
    echo "Update failed: " . $conn->error;
}

$stmt->close();
$conn->close();
?>
