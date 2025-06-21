<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit;
}

// DB connection
$conn = new mysqli("localhost", "root", "", "login");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get user info
$email = $_SESSION['email'];
$result = $conn->query("SELECT * FROM users WHERE email = '$email'");
$user = $result->fetch_assoc();
$user_id = $user['id'] ?? 0;

// Get user orders
$orders = $conn->query("SELECT * FROM orders WHERE user_id = $user_id ORDER BY created_at DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>My Orders - DailyDairy</title>
  <link rel="stylesheet" href="style.css" />
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f0f2f5;
    }

    .container {
      max-width: 900px;
      margin: 40px auto;
      background: #fff;
      padding: 30px 40px;
      border-radius: 12px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }

    h1, h2 {
      color: #333;
      margin-bottom: 10px;
    }

    .success-message {
      background-color: #d4edda;
      color: #155724;
      padding: 10px 15px;
      border-left: 5px solid #28a745;
      border-radius: 6px;
      margin-bottom: 20px;
    }

    .user-info form {
      margin-top: 15px;
    }

    .user-info input, .user-info textarea {
      width: 100%;
      padding: 10px;
      margin-top: -15px;
      margin-bottom: 15px;
      border: 1px solid #ccc;
      border-radius: 6px;
      font-size: 14px;
    }

    .user-info label {
      display: block;
      font-weight: bold;
      margin-bottom: 5px;
    }

    .user-info button {
      background-color: #28a745;
      color: white;
      padding: 10px 20px;
      border: none;
      border-radius: 6px;
      cursor: pointer;
      font-size: 15px;
    }

    .order-card {
      background-color: #fefefe;
      border-left: 5px solid orangered;
      padding: 20px;
      margin-bottom: 20px;
      border-radius: 8px;
    }

    .order-card h3 {
      margin: 0 0 10px 0;
      font-size: 18px;
    }

    .order-card p {
      margin: 6px 0;
      color: #555;
    }

    .order-card ul {
      padding-left: 20px;
      margin-top: 10px;
    }

    .no-orders {
      text-align: center;
      color: #888;
      font-size: 16px;
      margin-top: 20px;
    }
  </style>
</head>
<body>

  <div class="container">

    <h1>My Profile & Orders</h1><br>

    <?php if (isset($_GET['updated'])): ?>
      <div class="success-message">Your contact information was updated successfully.</div>
    <?php endif; ?>

    <!-- USER INFO + FORM -->
    <!-- USER INFO + FORM -->
<div class="user-info">
  <h2><?= htmlspecialchars($user['firstName'] . ' ' . $user['lastName']) ?></h2>
  <p><strong>Email:</strong> <?= htmlspecialchars($user['email']) ?></p>

  <form action="update_user_info.php" method="POST" style="margin-top: 20px;">

    <div style="margin-bottom: 20px;">
      <label for="number" style="display:block; margin-left:-1rem; font-weight:bold; margin-bottom:5px; margin-top: 40px;">Phone Number</label>
      <input type="text" id="number" name="number" value="<?= htmlspecialchars($user['number']) ?>" required>
    </div>

    <div style="margin-bottom: 10px;">
      <label for="address" style="display:block; margin-left:-1rem; font-weight:bold; margin-bottom:5px;">Address</label>
      <textarea id="address" name="address" rows="3" required><?= htmlspecialchars($user['address']) ?></textarea>
    </div>
    
    <div style="display: flex; gap: 10px; margin-top: 10px;">
  <button type="submit" style="background-color: #28a745; color: white; padding: 10px 20px; border: none; border-radius: 6px; cursor: pointer; font-size: 15px;">
    Save Changes
  </button>

  <a href="shop.php" style="text-decoration: none;">
    <button type="button" style="background-color: orangered; color: white; padding: 10px 20px; border: none; border-radius: 6px; cursor: pointer; font-size: 15px; margin-left:5.5rem;">
      Back to Shop
    </button>
  </a>
</div>

  </form>
</div>


    <hr style="margin: 30px 0;">

    <!-- ORDER LIST -->
     
     <div id="order"><h2>Order History</h2></div>
    
    <?php if ($orders->num_rows > 0): ?>
      <?php while ($order = $orders->fetch_assoc()): ?>
        <div class="order-card">
          <h3>Order #<?= $order['id'] ?> | ₹<?= number_format($order['total'], 2) ?></h3>
          <p><strong>Date:</strong> <?= date("d M Y, h:i A", strtotime($order['created_at'])) ?></p>
          <p><strong>Payment Method:</strong> Cash on Delivery</p>
          <p><strong>Items:</strong></p>
          <ul>
            <?php
              $items = json_decode($order['items'], true);
              foreach ($items as $item) {
                echo "<li>{$item['quantity']}x {$item['name']} @ ₹{$item['price']}</li>";
              }
            ?>
          </ul>
        </div>
      <?php endwhile; ?>
    <?php else: ?>
      <p class="no-orders">You haven’t placed any orders yet.</p>
    <?php endif; ?>

  </div>

</body>
</html>
