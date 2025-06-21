<?php
session_start();
header('Content-Type: application/json');

//  1. Check if user is logged in
if (!isset($_SESSION['email'])) {
    echo json_encode(['status' => 'error', 'message' => 'User not logged in']);
    exit;
}

//  2. Read and validate cart input
$data = json_decode(file_get_contents("php://input"), true);
if (!$data || !isset($data['items']) || !isset($data['total'])) {
    echo json_encode(['status' => 'error', 'message' => 'Invalid input']);
    exit;
}

$items = $data['items'];
$total = $data['total'];

//  3. Store cart in session
$_SESSION['cart'] = $items;
$_SESSION['cart_total'] = $total;

//  4. Connect to database
$conn = new mysqli("localhost", "root", "", "login");
if ($conn->connect_error) {
    echo json_encode(['status' => 'error', 'message' => 'DB connection failed']);
    exit;
}

//  5. Get user ID and email from users table
$email = $_SESSION['email'];
$result = $conn->query("SELECT id FROM users WHERE email = '$email'");
if (!$result || $result->num_rows === 0) {
    echo json_encode(['status' => 'error', 'message' => 'User not found']);
    exit;
}
$user = $result->fetch_assoc();
$user_id = $user['id'];

//  6. Insert order into orders table with user_id and email
$item_json = json_encode($items);

$stmt = $conn->prepare("INSERT INTO orders (user_id, email, items, total, created_at) VALUES (?, ?, ?, ?, NOW())");
$stmt->bind_param("issd", $user_id, $email, $item_json, $total);

if ($stmt->execute()) {
    echo json_encode(['status' => 'success']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'DB insert failed']);
}

$stmt->close();
$conn->close();
?>
