<?php
session_start();

// Read cart data sent from JavaScript
$data = json_decode(file_get_contents("php://input"), true);

// If the cart is empty or invalid, clear session
if (!$data || empty($data['items'])) {
    unset($_SESSION['cart']);
    unset($_SESSION['cart_total']);
} else {
    $_SESSION['cart'] = $data['items'];
    $_SESSION['cart_total'] = $data['total'];
}
