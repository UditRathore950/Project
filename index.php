<?php
session_start();
include("connect.php");
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <!-- <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7"
      crossorigin="anonymous"
    /> -->
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
      .logout {
        display: flex;
        align-items: center;
      }
      .logout a {
        color: white;
        padding: 0.4rem 1rem;
        margin-left: 2rem;
        text-align: center;
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
      .slides-container {
        overflow: hidden;
      }
      .slides-container img {
        opacity: 0.8;
      }

      .mySlides {
        width: 100%;
        position: absolute;
        height: 600px;
      }
      .para {
        position: relative;
        top: 100px;
        left: 120px;
        font-size: 1.7rem;
        margin-bottom: 10rem;
      }
      .para h1 {
        font-size: 4rem;
        text-shadow: 0px 0px 5px white;
      }
      .para h2 {
        text-shadow: 0px 0px 5px white;
      }
      .para a {
        text-decoration: none;
        background-color: rgb(235, 20, 20);
        color: white;
        padding: 0.8rem 2rem;
        font-size: 1rem;
        border-radius: 4rem;
        margin-left: 3rem;
      }
      .container1 {
        display: flex;
        justify-content: space-evenly;
        padding: 3rem;
        margin-top: 3rem;
        /* position: relative; */
        /* top: 120px; */
      }
      .box {
        display: flex;
        align-items: center;
      }
      .box i {
        color: red;
        font-size: 2rem;
      }
      .box1 {
        padding: 1rem;
        border-left: 1.2px solid black;
      }
      .box1b {
        border-left: 0px;
      }
      .box2 {
        font-size: 13px;
      }
      .box2 a {
        color: black;
      }

      .cover {
        background-image: url(img/dairy4.jpg);
        background-size: 700px;
        color: white;
        height: 45vh;
        width: 80%;
        background-position: center;
        align-content: center;
        text-align: center;
        margin-left: 130px;
        border-radius: 15px;
      }
      .cover-overlay {
        background: rgba(0, 0, 0, 0.4);
        height: 45vh;
        width: 100%;
        border-radius: 15px;
        align-content: center;
        font-size: 25px;
      }
      .ourpick h1 {
        margin-left: 8rem;
        margin-top: 4rem;
        font-size: 40px;
        margin-bottom: -1.5rem;
      }
      .picks {
        display: grid;
        grid-template-columns: auto auto auto auto;
        gap: 3rem;
        margin: 4rem 10rem;
      }
      .pick1 {
        text-align: center;
        padding: 1.5rem 0rem;
        color: rgb(108, 107, 107);
        border-radius: 10px;
        font-size: 22px;
        border: 2px solid gainsboro;
        box-shadow: 0px 7px 8px 0px gainsboro;
      }
      .pick1 p {
        font-weight: bold;
        margin-top: 1rem;
        cursor: pointer;
      }
      .pick1 a {
        color: rgb(108, 107, 107);
        text-decoration: none;
      }
      .pick1 img {
        height: 100px;
      }

      #bestdeals {
        margin: 2rem 4rem;
        color: black;
        font-size: 20px;
      }
      .container2 {
        display: flex;
        justify-content: space-evenly;
        margin: 3rem;
      }
      .iteams {
        text-align: center;
        border: 2px solid gainsboro;
        box-shadow: 0px 7px 8px 0px gainsboro;
        padding: 2rem 1rem;
        font-size: 25px;
      }
      .iteams img {
        height: 150px;
        margin: 2.5rem 0;
      }
      .iteams input {
        margin-bottom: 0.8rem;
      }
      .iteams button {
        background-color: rgb(235, 20, 20);
        color: white;
        padding: 0.5rem 3rem;
        font-size: 15px;
        border-radius: 4rem;
        border: none;
        cursor: pointer;
        transition: background-color 0.3s ease, transform 0.1s ease;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      }

      .iteams button:hover {
        background-color: red;
      }

      .iteams button:active {
        transform: scale(0.97);
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2) inset;
      }
      .container3 {
        display: flex;
        align-items: center;
        justify-content: space-evenly;
        padding: 2rem;
      }
      .shopbtn {
        text-align: center;
        margin: 3rem 0;
      }
      .shopbtn a {
        text-decoration: none;
        color: white;
        background-color: rgb(235, 20, 20);
        padding: 0.6rem 2rem;
        border-radius: 4rem;
      }
      .buybtn {
        margin-bottom: 1rem;
      }
      .buybtn a {
        color: white;
        background-color: red;
        padding: 0.5rem 3.5rem;
      }
      .box3 img {
        height: 500px;
        width: 350px;
        opacity: 0.8;
      }
      .box4 img {
        height: 500px;
        width: 650px;
        opacity: 0.8;
      }
      .content1 {
        position: relative;
        font-size: 30px;
        bottom: 360px;
        left: 20px;
      }
      .content1 a {
        text-decoration: none;
        background-color: rgb(235, 20, 20);
        color: white;
        border-radius: 4rem;
        padding: 0.5rem 1.5rem;
        font-size: 20px;
      }
      .content {
        position: relative;
        font-size: 30px;
        bottom: 370px;
        left: 40px;
      }
      .content a {
        text-decoration: none;
        background-color: rgb(235, 20, 20);
        color: white;
        border-radius: 4rem;
        padding: 0.5rem 1.5rem;
        font-size: 20px;
      }
      .container4 {
        display: flex;
        justify-content: space-evenly;
        margin: 0px 8rem;
        position: relative;
        bottom: 120px;
      }
      #cartiteams {
        margin: 0rem 6rem;
        color: black;
        font-size: 20px;
        position: relative;
        bottom: 180px;
      }
      .cartbtn {
        text-align: center;
        position: relative;
        bottom: 50px;
      }
      .cartbtn a {
        text-decoration: none;
        color: white;
        background-color: rgb(235, 20, 20);
        padding: 0.6rem 2rem;
        border-radius: 4rem;
      }
      .container5 img {
        width: 100%;
        opacity: 0.8;
      }
      .container5 {
        position: absolute;
        background: rgba(0, 0, 0, 0.2);
      }
      .container6 {
        position: relative;
        top: 250px;
        font-size: 40px;
        margin-left: 200px;
      }
      .container7 {
        position: relative;
        top: 400px;
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
        position: relative;
        top: 400px;
        background-color: rgb(235, 20, 20);
        text-align: center;
        padding: 2rem 8rem;
        color: white;
      }
      .msg2 {
        border-top: 1.5px solid white;
        padding: 4rem;
      }
      .msg2 a {
        margin: 3rem;
        color: white;
      }
      .footer {
        text-align: center;
        padding: 1rem;
        position: relative;
        top: 350px;
        background-color: white;
      }
    </style>
  </head>
  <body>
    <div class="navbar1">
      <div class="logs">
        <a href="#home">Home</a>
        <a href="about.php">About Us</a>
        <a href="customersupport.php">Customer Support</a>
      </div>
      <!-- <p>Shop on the go, get the product you need.</p> -->
      <div
        id="login"
        class="login"
        style="display: <?= isset($_SESSION['email']) ? 'none' : 'inline-block' ?>;"
      >
        <a id="loginBtn" href="login.php">
          <i class="fa-solid fa-user"></i> Log In/ Sign Up</a
        >
      </div>
      <div
        id="logout"
        class="logout"
        style="display: <?= isset($_SESSION['email']) ? 'inline-block' : 'none' ?>;"
      >
        <p>
          Hello,
          <?php 
          if (isset($_SESSION['email'])){
          $email=$_SESSION['email'];
          $query=mysqli_query($conn, "SELECT users.* FROM `users` WHERE users.email='$email'");
          while($row=mysqli_fetch_array($query)){
              echo $row['firstName'].' '.$row['lastName'];
          }
        } 
        ?>
        </p>
        <a id="logoutBtn" href="logout.php">Logout</a>
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
      <a href="#bestdeals">Deals & Offers</a>
      <a href="shop.php">Shop/ Products</a>
      <a href="#ourpicks">Our Picks</a>
      <a href="myorders.php #order">My Orders</a>
    </div>

    <div class="slides-container">
      <img class="mySlides" src="img/dairy12.jpg" />
      <img class="mySlides" src="img/dairy11.jpg" />
      <img class="mySlides" src="img/dairy13.jpg" />
      <div class="para">
        <p>Easy, Fresh and Convinent</p>
        <h1>Stock Up on</h1>
        <h1>Daily Essentials</h1>
        <br />
        <h2>Save Big on Your</h2>
        <h2>Favorite Products</h2>
        <br /><br />
        <a href="shop.php">Shop Now</a>
      </div>
    </div>

    <div class="container1">
      <div class="box">
        <div class="box1 box1b">
          <i class="fa-solid fa-truck-fast"></i>
        </div>
        <div class="box2">
          <h2>Free Delivery</h2>
          <p>To Your Door</p>
        </div>
      </div>
      <div class="box">
        <div class="box1">
          <i class="fa-solid fa-basket-shopping"></i>
        </div>
        <div class="box2">
          <h2>Local Pickups</h2>
          <p>Check Out <a href=""> Locations</a></p>
        </div>
      </div>
      <div class="box">
        <div class="box1">
          <i class="fa-solid fa-headset"></i>
        </div>
        <div class="box2">
          <h2>Available for You</h2>
          <p><a href="">Online Support</a> 24/7</p>
        </div>
      </div>
      <div class="box">
        <div class="box1">
          <i class="fa-solid fa-mobile-screen-button"></i>
        </div>
        <div class="box2">
          <h2>Order on the Go</h2>
          <p>Explore Our Site</p>
        </div>
      </div>
    </div>

    <div class="cover">
      <div class="cover-overlay">
        <h1>DailyDairy.</h1>
        <p>"Where Freshness Meets Convenience."</p>
      </div>
    </div>

    <div class="ourpick" id="ourpicks">
      <h1>Our <span style="color: red">P</span>icks</h1>
    </div>
    <div class="picks">
      <div class="pick1">
        <a href="shop.php #milk"
          ><img src="img/milkbottle.png" alt="" />
          <p>Milk</p></a
        >
      </div>
      <div class="pick1">
        <a href="shop.php #butter"
          ><img src="img/butter.png" alt="" />
          <p>Butter</p></a
        >
      </div>
      <div class="pick1">
        <a href="shop.php #cheese"
          ><img src="img/cheese.png" alt="" />
          <p>Cheese</p></a
        >
      </div>
      <div class="pick1">
        <a href="shop.php #cream"
          ><img src="img/clottedcream.png" alt="" />
          <p>Cream</p></a
        >
      </div>
      <div class="pick1">
        <a href="shop.php #yogurt"
          ><img src="img/strawberyyogurt.png" alt="" />
          <p>Yogurt</p></a
        >
      </div>
      <div class="pick1">
        <a href="shop.php #milk"
          ><img src="img/proteinrich.png" alt="" />
          <p>Flavored Milk</p></a
        >
      </div>
      <div class="pick1">
        <a href="shop.php #eggs"
          ><img src="img/egg.png" alt="" />
          <p>Eggs</p></a
        >
      </div>
      <div class="pick1">
        <a href="shop.php #nutrition"
          ><img src="img/babyformula.png" alt="" />
          <p>Nutritional Iteams</p></a
        >
      </div>
    </div>

    <div id="bestdeals">
      <h1>Best <span style="color: red">D</span>eals</h1>
    </div>

    <div class="container2">
      <div class="card iteams">
        <img id="milk" src="img/milk.png" alt="" />
        <h6 class="card--title">Milk-1l</h6>
        <div class="card--price">
          <h5 class="price">₹50</h5>
          <br />
          <button class="add-to-cart">Add to Cart</button>
        </div>
      </div>
      <div class="card iteams">
        <img id="cheese" src="img/cheesebar.png" alt="" />
        <h6 class="card--title">Cheese</h6>
        <div class="card--price">
          <h5 class="price">₹140</h5>
          <br />
          <button class="add-to-cart">Add to Cart</button>
        </div>
      </div>
      <div class="card iteams">
        <img id="yogurt" src="img/fruityogurt.png" alt="" />
        <h6 class="card--title">Yogurt</h6>
        <div class="card--price">
          <h5 class="price">₹100</h5>
          <br />
          <button class="add-to-cart">Add to Cart</button>
        </div>
      </div>
      <div class="card iteams">
        <img id="butter" src="img/butter.png" alt="" />
        <h6 class="card--title">Butter</h6>
        <div class="card--price">
          <h5 class="price">₹140</h5>
          <br />
          <button class="add-to-cart">Add to Cart</button>
        </div>
      </div>
      <div class="card iteams">
        <img id="egg" src="img/egg.png" alt="" />
        <h6 class="card--title">Eggs</h6>
        <div class="card--price">
          <h5 class="price">₹80</h5>
          <br />
          <button class="add-to-cart">Add to Cart</button>
        </div>
      </div>
    </div>
    <div class="shopbtn"><a href="shop.php">Shop Best Deals</a></div>
    <div class="container3">
      <div class="box3">
        <img src="img/dairy14.png" alt="" />
        <div class="content1">
          <h4>Deal of the Week</h4>
          <h1>15% off</h1>
          <h3>All Milk Products</h3>
          <br />
          <a href="shop.php">Shop Now</a>
        </div>
      </div>
      <div class="box4">
        <img src="img/dairy.png" alt="" />
        <div class="content">
          <h4>Taste of India</h4>
          <h3>Great Deals on Yours</h3>
          <h1>Favorite Iteams</h1>
          <br />
          <a href="shop.php">Shop Now</a>
        </div>
      </div>
    </div>

    <div id="cartiteams"><h1>Start Your Cart</h1></div>

    <div class="container4">
      <div class="card iteams">
        <img id="cheese" src="img/proteinrich.png" alt="" />
        <h6 class="card--title">Protien Milk</h6>
        <div class="card--price">
          <h5 class="price">₹100</h5>
          <br />
          <button class="add-to-cart">Add to Cart</button>
        </div>
      </div>
      <div class="card iteams">
        <img id="yogurt" src="img/probioticmango.png" alt="" />
        <h6 class="card--title">Probiotic Mango Yogurt</h6>
        <div class="card--price">
          <h5 class="price">₹100</h5>
          <br />
          <button class="add-to-cart">Add to Cart</button>
        </div>
      </div>
      <div class="card iteams">
        <img id="butter" src="img/clottedcream.png" alt="" />
        <h6 class="card--title">Clotted Cream</h6>
        <div class="card--price">
          <h5 class="price">₹130</h5>
          <br />
          <button class="add-to-cart">Add to Cart</button>
        </div>
      </div>
      <div class="card iteams">
        <img id="egg" src="img/brownegg.png" alt="" />
        <h6 class="card--title">Brown Eggs</h6>
        <div class="card--price">
          <h5 class="price">₹120</h5>
          <br />
          <button class="add-to-cart">Add to Cart</button>
        </div>
      </div>
    </div>
    <div class="cartbtn"><a href="shop.php">Shop More Products</a></div>

    <div class="container5">
      <img src="img/Dairy Delights.png" alt="" />
    </div>
    <div class="container6">
      <h4>Save Time & Money</h4>
      <h1>Shop With Us <br />on the Go</h1>
      <h4>
        Your weekly shopping routine, at your <br />
        door in just a click
      </h4>
    </div>

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

    <script>
      const login = document.getElementById("login");
      const logout = document.getElementById("logout");

      // Check saved login state on page load
      if (localStorage.getItem("isLoggedIn") === "true") {
        login.style.display = "none";
        logout.style.display = "inline-block";
      } else {
        login.style.display = "inline-block";
        logout.style.display = "none";
      }

      login.addEventListener("click", () => {
        // Simulate login success
        login.style.display = "none";
        logout.style.display = "inline-block";
        localStorage.setItem("isLoggedIn", "true"); // Save login state
      });

      //  Only ONE logout listener
      logout.addEventListener("click", () => {
        localStorage.setItem("isLoggedIn", "false"); // Clear login state
        window.location.href = "logout.php"; // Redirect to server-side logout
      });

      var myIndex = 0;
      carousel();

      function carousel() {
        var i;
        var x = document.getElementsByClassName("mySlides");
        for (i = 0; i < x.length; i++) {
          x[i].style.display = "none";
        }
        myIndex++;
        if (myIndex > x.length) {
          myIndex = 1;
        }
        x[myIndex - 1].style.display = "block";
        setTimeout(carousel, 4000); // Change image every 5 seconds
      }
    </script>
  </body>
</html>
