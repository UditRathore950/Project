<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
      integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />

    <style>
      * {
        margin: 0;
        padding: 0;
      }
      body {
        font-family: "Trebuchet MS", "Lucida Sans Unicode", "Lucida Grande",
          "Lucida Sans", Arial, sans-serif;
      }
      .navbar1 {
        background-color: rgb(140, 0, 0);
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 1rem 2rem;
        color: white;
      }
      .logs a {
        text-decoration: none;
        color: white;
        margin: 30px;
      }
      .login a {
        text-decoration: none;
        color: white;
        margin-right: 5rem;
      }
      .navbar2 {
        background-color: rgb(235, 20, 20);
        display: flex;
        padding: 2rem;
        justify-content: space-between;
        align-items: center;
      }
      .navbar2 i {
        color: white;
      }
      .name {
        text-decoration: none;
        color: white;
        font-size: 35px;
        font-weight: bold;
      }
      .searchbar {
        border: 1.5px solid white;
        /* padding: 0.5rem 1rem; */
        border-radius: 4rem;
      }
      .searchbar ::placeholder {
        color: white;
      }
      .searchbar i {
        color: white;
        cursor: pointer;
        padding: 0.2rem 1rem 0.2rem 0.5rem;
      }
      .searchbar input {
        background: transparent;
        border: none;
        padding: 0.5rem 1rem;
        border-radius: 4rem 0 0 4rem;
      }
      .search {
        border: none;
        background-color: rgb(235, 20, 20);
        width: 300px;
      }
      .logo {
        font-size: 25px;
        display: flex;
      }
      .logo i {
        margin: 0.5rem;
        cursor: pointer;
      }
      .cart-icon {
        position: relative;
        cursor: pointer;
      }
      .cart-icon span {
        background-color: beige;
        color: red;
        border-radius: 50%;
        width: 18px;
        height: 18px;
        font-size: 15px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 600;
        position: absolute;
        right: -4px;
        top: -4px;
      }

      /* cart menu sidebar */

      .sidebar {
        width: 300px;
        height: 100%;
        position: fixed;
        top: 0;
        right: -350px;
        background-color: white;
        box-shadow: -4px 0 6px rgba(0, 0, 0, 0.1);
        transition: right 0.3s ease-in-out;
        z-index: 1000;
        padding: 20px;
        /* border-top-left-radius: 20px;
        border-bottom-left-radius: 20px; */
      }
      .sidebar.open {
        right: 0;
      }
      .sidebar-close {
        position: absolute;
        right: 20px;
        top: 10px;
        cursor: pointer;
      }
      .cart-items {
        display: flex;
        flex-direction: column;
        gap: 10px;
        margin-top: 2rem;
      }
      .individual-cart-item {
        display: flex;
        justify-content: space-between;
        padding: 10px 5px;
        border-radius: 5px;
        color: gray;
        border: 1px solid gainsboro;
      }
      .cart-item-price {
        color: gray;
      }
      .sidebar--footer {
        position: absolute;
        bottom: 10px;
        width: 88%;
      }
      .total--amount {
        display: flex;
        align-items: center;
        justify-content: space-between;
        border: 2px solid gainsboro;
        border-radius: 5px;
        padding: 15px 10px;
      }
      .cart-total {
        font-size: 16px;
        font-weight: 500;
        color: gray;
      }
      #checkout-btn {
        width: 100%;
        margin-top: 1rem;
        background-color: orangered;
        border: none;
        color: white;
        border-radius: 5px;
        cursor: pointer;
        padding: 10px;
        margin-bottom: 3rem;
      }
      .remove-item {
        background: gainsboro;
        color: gray;
        border-radius: 5px;
        padding: 2px 4px;
        cursor: pointer;
        margin-left: 5px;
        border: 1px solid gray;
      }
      .navbar3 {
        padding: 2rem 4rem;
        background-color: white;
        display: flex;
        justify-content: space-evenly;
      }
      .navbar3 a {
        text-decoration: none;
        color: black;
      }

      /*  */

      .header {
        text-align: center;
        padding: 2rem;
      }
      .header h1 {
        font-size: 75px;
      }
      .main {
        display: flex;
        margin: 4rem 11rem 8rem 11rem;
        border: 1px solid black;
      }
      .main img {
        height: 700px;
        width: 500px;
      }
      .form {
        padding: 2rem 1.5rem 2rem 0.5rem;
        text-align: left;
      }
      .form input {
        height: 30px;
        width: 350px;
        border: 1px solid black;
        margin: 0.5rem 0rem;
      }
      .form textarea {
        height: 80px;
        width: 350px;
        border: 1px solid black;
        margin: 0.5rem 0rem;
      }
      .form button {
        margin: 1rem 0rem;
        padding: 0.6rem 2rem;
        border-radius: 4rem;
        background-color: rgb(235, 20, 20);
        font-family: "Trebuchet MS", "Lucida Sans Unicode", "Lucida Grande",
          "Lucida Sans", Arial, sans-serif;
        color: white;
        border: 0;
        font-size: medium;
      }

      .container7 {
        background-color: rgb(235, 20, 20);
        color: white;
        display: flex;
        justify-content: space-evenly;
        padding: 3rem;
        font-size: large;
      }
      .msg a {
        color: white;
      }
      .msg-img {
        margin-top: 3rem;
      }
      .msg-img i {
        margin: 5px;
      }
      .container8 {
        background-color: rgb(235, 20, 20);
        text-align: center;
        padding: 2rem 8rem;
        color: white;
      }
      .msg2 {
        border-top: 1.5px solid white;
        padding: 2rem;
      }
      .msg2 a {
        margin: 3rem;
        color: white;
      }
      .footer {
        text-align: center;
        padding: 1rem;
        background-color: white;
      }
    </style>
  </head>
  <body>
    <div class="navbar1">
      <div class="logs">
        <a href="index.php">Home</a>
        <a href="about.php">About Us</a>
        <a href="customersupport.php">Customer Support</a>
      </div>
      <!-- <p>Shop on the go, get the product you need.</p> -->
      <div class="login">
        <i class="fa-solid fa-user"></i>
        <?php if (isset($_SESSION['email'])): ?>
        <a href="logout.php">Logout</a>
        <?php else: ?>
        <a href="login.php">Log In/ Sign Up</a>
        <?php endif; ?>
      </div>
    </div>
    <div class="navbar2">
      <a class="name" href="">DailyDairy.</a>
      <div class="searchbar">
        <input class="search" type="text" placeholder="Search..." />
        <i class="fa-solid fa-magnifying-glass"></i>
      </div>
      <div class="logo">
        <a href="myorders.php"><i class="fa-solid fa-user-pen"></i></a>
        <i class="fa-solid fa-heart"></i>

        <?php if (isset($_SESSION['email'])): ?>
        <!-- Only logged-in users will see this -->
        <div class="cart-icon">
          <i class="fa-solid fa-cart-shopping"></i>
          <span>0</span>
        </div>
        <?php endif; ?>
      </div>
    </div>

    <!--cart sidebar -->
    <?php if (isset($_SESSION['email'])): ?>
    <div class="sidebar" id="sidebar">
      <div class="sidebar-close">
        <i class="fa-solid fa-close"></i>
      </div>
      <div class="cart-menu">
        <h3>My Cart</h3>
        <div class="cart-items">Your cart is empty</div>
      </div>
      <div class="sidebar--footer">
        <div class="total--amount">
          <h5>Total</h5>
          <div class="cart-total">₹0.00</div>
        </div>
        <button id="checkout-btn" class="checkout-button">
          Proceed to Checkout
        </button>
      </div>
    </div>
    <?php endif; ?>

    <div class="navbar3">
      <a href="index.php #bestdeals">Deals & Offers</a>
      <a href="shop.php">Shop/ Products</a>
      <a href="index.php #ourpicks">Our Picks</a>
      <a href="myorders.php #order">My Orders</a>
    </div>

    <!--  -->

    <div class="header">
      <h1>Customer Support</h1>
      <br />
      <p>
        Our *Customer Support* team is here to ensure your experience is smooth,
        friendly, and stress-free. <br />
        Whether you have a question, need help with an order, or just want to
        share feedback, we’re always ready to listen and assist. <br />
        Quick responses, real solutions, and a personal touch—that’s our promise
        to you.
      </p>
    </div>
    <div class="main">
      <img src="img/dairyfarm1.jpg" alt="" />
      <div class="form">
        <h1>We're Here to Help!</h1>
        <br /><br />
        <h3>
          Fill out the form with any quarry on your mind and we'll get back to
          you as soon as possible
        </h3>
        <br /><br />
        <label for="firstname">First Name*</label><br />
        <input type="text" /><br />
        <label for="lastname">Last Name*</label><br />
        <input type="text" /><br />
        <label for="number">Phone*</label><br />
        <input type="number" /><br />
        <label for="email">Email*</label><br />
        <input type="email" /><br />
        <label for="text">Leave us a message...</label><br />
        <textarea name="message" id="message"></textarea><br />
        <button>Submit</button>
      </div>
    </div>
    <!--  -->
    <!--  -->

    <div class="container7">
      <div class="msg">
        <h1>DailyDairy</h1>
        <br /><br />
        <h3>Need Help?</h3>
        <br />
        <h5>Visit our <a href="customersupport.php">Customer Support</a></h5>
        <h5>for assistance or call us at</h5>
        <br />
        <h4>123-456-7890</h4>
        <br />
        <h5>DailyDairy123@gmail.com</h5>
        <div class="msg-img">
          <i class="fa-brands fa-facebook-f"></i>
          <i class="fa-brands fa-twitter"></i>
          <i class="fa-brands fa-instagram"></i>
          <i class="fa-brands fa-youtube"></i>
        </div>
      </div>
      <div class="msg">
        <h3>Categories</h3>
        <br /><br />
        <h5><a href="shop.php #milk">Milk</a></h5>
        <br />
        <h5><a href="shop.php #cheese">Cheese</a></h5>
        <br />
        <h5><a href="shop.php #butter">Butter</a></h5>
        <br />
        <h5><a href="shop.php #cream">Cream</a></h5>
        <br />
        <h5><a href="shop.php #yogurt">Yogurt</a></h5>
        <br />
        <h5><a href="shop.php #nutrition">Nutritional Products</a></h5>
        <br />
        <h5><a href="shop.php #eggs">Eggs</a></h5>
      </div>
      <div class="msg">
        <h3>Info</h3>
        <br /><br />
        <h5><a href="about.php">About Us</a></h5>
        <br />
        <h5><a href="customersupport.php">Customer Support</a></h5>
        <br />
        <h5>FAQ</h5>
        <br />
        <h5>Locations</h5>
      </div>
      <div class="msg">
        <h3>My Choices</h3>
        <br /><br />
        <h5>Favorites</h5>
        <br />
        <h5>My Orders</h5>
      </div>
      <div class="msg">
        <h3>Legal</h3>
        <br /><br />
        <h5>Terms & Conditions</h5>
        <br />
        <h5>Privacy Policy</h5>
      </div>
    </div>
    <div class="container8">
      <div class="msg2">
        <a href="">Shipping & Returns</a>
        <a href="">Terms & Conditions</a>
        <a href="">Payment Methods</a>
      </div>
    </div>
    <div class="footer">
      <p>&copy; 2025 by DailyDairy. All rights reserved.</p>
    </div>

    <?php session_start(); ?>
    <script>
      const initialCartItems = <?php echo json_encode($_SESSION['cart'] ?? []); ?>;
      const initialTotalAmount = <?php echo json_encode($_SESSION['cart_total'] ?? 0); ?>;
    </script>

    <script src="cart.js"></script>
  </body>
</html>
