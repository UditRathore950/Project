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

      .heading {
        text-align: center;
        font-size: 35px;
        margin-top: 3rem;
        padding: 0.8rem;
        /* background-color: rgb(235, 20, 20);
        color: white; */
      }
      .heading2 h2 {
        margin-left: 10rem;
        margin-top: 5rem;
        font-size: 30px;
      }

      .milkproducts {
        display: grid;
        grid-template-columns: auto auto auto auto;
        gap: 50px;
        margin: 4rem 10rem;
      }
      .iteams {
        text-align: center;
        border: 2px solid gainsboro;
        box-shadow: 0px 7px 8px 0px gainsboro;
        padding: 2rem 0.5rem;
        font-size: 25px;
      }
      .iteams img {
        height: 180px;
        margin: 2.5rem 0;
      }
      .iteams input {
        margin-bottom: 0.8rem;
      }
      .iteams h5 {
        margin-top: 5px;
      }
      .iteams button {
        background-color: rgb(235, 20, 20);
        color: white;
        padding: 0.5rem 2.5rem;
        font-size: 13px;
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

      .buybtn {
        margin-bottom: 1rem;
      }
      .buybtn a {
        color: white;
        background-color: red;
        padding: 0.5rem 3rem;
      }

      .heading3 h2 {
        margin-left: 10rem;
        margin-top: 5rem;
        font-size: 30px;
      }
      .cheeseproducts {
        display: grid;
        grid-template-columns: auto auto auto auto;
        gap: 40px;
        margin: 4rem 10rem;
      }
      .heading4 h2 {
        margin-left: 10rem;
        margin-top: 5rem;
        font-size: 30px;
      }
      .yogurtproducts {
        display: grid;
        grid-template-columns: auto auto auto auto;
        gap: 30px;
        margin: 4rem 10rem;
      }
      .heading5 h2 {
        margin-left: 10rem;
        margin-top: 5rem;
        font-size: 30px;
      }
      .butterproducts {
        display: grid;
        grid-template-columns: auto auto auto auto;
        gap: 30px;
        margin: 4rem 10rem;
      }
      .heading6 h2 {
        margin-left: 10rem;
        margin-top: 5rem;
        font-size: 30px;
      }
      .creamproducts {
        display: grid;
        grid-template-columns: auto auto auto auto;
        gap: 40px;
        margin: 4rem 10rem;
      }
      .heading7 h2 {
        margin-left: 10rem;
        margin-top: 5rem;
        font-size: 30px;
      }
      .nutritionalproducts {
        display: grid;
        grid-template-columns: auto auto auto auto;
        gap: 40px;
        margin: 4rem 10rem;
      }
      .heading8 h2 {
        margin-left: 10rem;
        margin-top: 5rem;
        font-size: 30px;
      }
      .eggproducts {
        display: grid;
        grid-template-columns: auto auto auto auto;
        gap: 80px;
        margin: 4rem 10rem;
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
        padding: 4rem;
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
      <a href="#">Shop/ Products</a>
      <a href="index.php #ourpicks">Our Picks</a>
      <a href="myorders.php #order">My Orders</a>
    </div>

    <div class="heading"><h1>All Products</h1></div>

    <div class="heading2"><h2>Milk & Milk Varients</h2></div>

    <div id="milk" class="card--list milkproducts">
      <div class="card iteams">
        <img src="img/milk.png" alt="" />
        <h6 class="card--title">Fresh Milk-1l</h6>
        <div class="card--price">
          <h5 class="price">₹50</h5>
          <br />
          <button class="add-to-cart">Add to Cart</button>
        </div>
      </div>
      <div class="card iteams">
        <img src="img/milk2.png" alt="" />
        <h6 class="card--title">Fresh Milk-2l</h6>
        <div class="card--price">
          <h5 class="price">₹100</h5>
          <br />
          <button class="add-to-cart">Add to Cart</button>
        </div>
      </div>
      <div class="card iteams">
        <img src="img/skimmed.png" alt="" />
        <h6 class="card--title">Skimmed Milk</h6>
        <div class="card--price">
          <h5 class="price">₹60</h5>
          <br />
          <button class="add-to-cart">Add to Cart</button>
        </div>
      </div>
      <div class="card iteams">
        <img src="img/lowfatmilk2.png" alt="" />
        <h6 class="card--title">Low Fat Milk</h6>
        <div class="card--price">
          <h5 class="price">₹60</h5>
          <br />
          <button class="add-to-cart">Add to Cart</button>
        </div>
      </div>
      <div class="card iteams">
        <img src="img/lactosefreemilk.png" alt="" />
        <h6 class="card--title">Lactose free Milk</h6>
        <div class="card--price">
          <h5 class="price">₹65</h5>
          <br />
          <button class="add-to-cart">Add to Cart</button>
        </div>
      </div>
      <div class="card iteams">
        <img src="img/longlifemilk.png" alt="" />
        <h6 class="card--title">Long life Milk</h6>
        <div class="card--price">
          <h5 class="price">₹60</h5>
          <br />
          <button class="add-to-cart">Add to Cart</button>
        </div>
      </div>
      <div class="card iteams">
        <img src="img/organicmilk.png" alt="" />
        <h6 class="card--title">Organic Milk</h6>
        <div class="card--price">
          <h5 class="price">₹60</h5>
          <br />
          <button class="add-to-cart">Add to Cart</button>
        </div>
      </div>
      <div class="card iteams">
        <img src="img/chocolatemilk.png" alt="" />
        <h6 class="card--title">Choclate flavored Milk</h6>
        <div class="card--price">
          <h5 class="price">₹80</h5>
          <br />
          <button class="add-to-cart">Add to Cart</button>
        </div>
      </div>
      <div class="card iteams">
        <img src="img/strawberymilk.png" alt="" />
        <h6 class="card--title">Strawbery flavored Milk</h6>
        <div class="card--price">
          <h5 class="price">₹80</h5>
          <br />
          <button class="add-to-cart">Add to Cart</button>
        </div>
      </div>
      <div class="card iteams">
        <img src="img/buffalomilk.png" alt="" />
        <h6 class="card--title">Buffalo Milk-1l</h6>
        <div class="card--price">
          <h5 class="price">₹45</h5>
          <br />
          <button class="add-to-cart">Add to Cart</button>
        </div>
      </div>
      <div class="card iteams">
        <img src="img/buffalomilk2.png" alt="" />
        <h6 class="card--title">Buffalo Milk-2l</h6>
        <div class="card--price">
          <h5 class="price">₹90</h5>
          <br />
          <button class="add-to-cart">Add to Cart</button>
        </div>
      </div>
      <div class="card iteams">
        <img src="img/goatmilk.png" alt="" />
        <h6 class="card--title">Goat Milk-1l</h6>
        <div class="card--price">
          <h5 class="price">₹40</h5>
          <br />
          <button class="add-to-cart">Add to Cart</button>
        </div>
      </div>
    </div>
    <div id="cheese" class="heading3"><h2>Cheese Products</h2></div>
    <div class="card--list cheeseproducts">
      <div class="card iteams">
        <img src="img/cheddarcheese.png" alt="" />
        <h6 class="card--title">Cheddar Cheese</h6>
        <div class="card--price">
          <h5 class="price">₹150</h5>
          <br />
          <button class="add-to-cart">Add to Cart</button>
        </div>
      </div>
      <div class="card iteams">
        <img src="img/mozzarellacheese.png" alt="" />
        <h6 class="card--title">Mozzarella Cheese</h6>
        <div class="card--price">
          <h5 class="price">₹200</h5>
          <br />
          <button class="add-to-cart">Add to Cart</button>
        </div>
      </div>
      <div class="card iteams">
        <img src="img/paneer.png" alt="" />
        <h6 class="card--title">Paneer</h6>
        <div class="card--price">
          <h5 class="price">₹100</h5>
          <br />
          <button class="add-to-cart">Add to Cart</button>
        </div>
      </div>
      <div class="card iteams">
        <img src="img/fetacheese.png" alt="" />
        <h6 class="card--title">Feta Cheese</h6>
        <div class="card--price">
          <h5 class="price">₹170</h5>
          <br />
          <button class="add-to-cart">Add to Cart</button>
        </div>
      </div>
      <div class="card iteams">
        <img src="img/parmesancheese.png" alt="" />
        <h6 class="card--title">Parmesan Cheese</h6>
        <div class="card--price">
          <h5 class="price">₹140</h5>
          <br />
          <button class="add-to-cart">Add to Cart</button>
        </div>
      </div>
      <div class="card iteams">
        <img src="img/cheeseslice.png" alt="" />
        <h6 class="card--title">Cheese Slices</h6>
        <div class="card--price">
          <h5 class="price">₹150</h5>
          <br />
          <button class="add-to-cart">Add to Cart</button>
        </div>
      </div>
      <div class="card iteams">
        <img src="img/creamcheese.png" alt="" />
        <h6 class="card--title">Cream Cheese</h6>
        <div class="card--price">
          <h5 class="price">₹180</h5>
          <br />
          <button class="add-to-cart">Add to Cart</button>
        </div>
      </div>

      <div class="card iteams">
        <img src="img/cheesebar.png" alt="" />
        <h6 class="card--title">Cheese Bar</h6>
        <div class="card--price">
          <h5 class="price">₹140</h5>
          <br />
          <button class="add-to-cart">Add to Cart</button>
        </div>
      </div>
    </div>

    <div id="yogurt" class="heading4"><h2>Yogurt & Cultured Products</h2></div>
    <div class="card--list yogurtproducts">
      <div class="card iteams">
        <img src="img/greekyogurt.png" alt="" />
        <h6 class="card--title">Yogurt</h6>
        <div class="card--price">
          <h5 class="price">₹80</h5>
          <br />
          <button class="add-to-cart">Add to Cart</button>
        </div>
      </div>
      <div class="card iteams">
        <img src="img/fruityogurt.png" alt="" />
        <h6 class="card--title">Blueberry Yogurt</h6>
        <div class="card--price">
          <h5 class="price">₹100</h5>
          <br />
          <button class="add-to-cart">Add to Cart</button>
        </div>
      </div>
      <div class="card iteams">
        <img src="img/mangoyogurt.png" alt="" />
        <h6 class="card--title">Mango Yogurt</h6>
        <div class="card--price">
          <h5 class="price">₹100</h5>
          <br />
          <button class="add-to-cart">Add to Cart</button>
        </div>
      </div>
      <div class="card iteams">
        <img src="img/strawberyyogurt.png" alt="" />
        <h6 class="card--title">Strawbery Yogurt</h6>
        <div class="card--price">
          <h5 class="price">₹100</h5>
          <br />
          <button class="add-to-cart">Add to Cart</button>
        </div>
      </div>
      <div class="card iteams">
        <img src="img/yogurt.png" alt="" />
        <h6 class="card--title">Greek Yogurt</h6>
        <div class="card--price">
          <h5 class="price">₹85</h5>
          <br />
          <button class="add-to-cart">Add to Cart</button>
        </div>
      </div>
      <div class="card iteams">
        <img src="img/probioticyogurt.png" alt="" />
        <h6 class="card--title">Probiotic Yogurt</h6>
        <div class="card--price">
          <h5 class="price">₹100</h5>
          <br />
          <button class="add-to-cart">Add to Cart</button>
        </div>
      </div>
      <div class="card iteams">
        <img src="img/lassi.png" alt="" />
        <h6 class="card--title">Lassi</h6>
        <div class="card--price">
          <h5 class="price">₹60</h5>
          <br />
          <button class="add-to-cart">Add to Cart</button>
        </div>
      </div>

      <div class="card iteams">
        <img src="img/buttermilk.png" alt="" />
        <h6 class="card--title">Butter Milk</h6>
        <div class="card--price">
          <h5 class="price">₹50</h5>
          <br />
          <button class="add-to-cart">Add to Cart</button>
        </div>
      </div>
    </div>
    <div id="butter" class="heading5"><h2>Butter & Spreads</h2></div>
    <div class="card--list butterproducts">
      <div class="card iteams">
        <img src="img/butter.png" alt="" />
        <h6 class="card--title">Butter</h6>
        <div class="card--price">
          <h5 class="price">₹140</h5>
          <br />
          <button class="add-to-cart">Add to Cart</button>
        </div>
      </div>
      <div class="card iteams">
        <img src="img/flavoredbutter.png" alt="" />
        <h6 class="card--title">Flavored Butter</h6>
        <div class="card--price">
          <h5 class="price">₹170</h5>
          <br />
          <button class="add-to-cart">Add to Cart</button>
        </div>
      </div>
      <div class="card iteams">
        <img src="img/ghee.png" alt="" />
        <h6 class="card--title">Ghee</h6>
        <div class="card--price">
          <h5 class="price">₹370</h5>
          <br />
          <button class="add-to-cart">Add to Cart</button>
        </div>
      </div>
      <div class="card iteams">
        <img src="img/buffaloghee.png" alt="" />
        <h6 class="card--title">Buffalo Ghee</h6>
        <div class="card--price">
          <h5 class="price">₹300</h5>
          <br />
          <button class="add-to-cart">Add to Cart</button>
        </div>
      </div>
      <div class="card iteams">
        <img src="img/unsaltedbutter.png" alt="" />
        <h6 class="card--title">Unsalted Butter</h6>
        <div class="card--price">
          <h5 class="price">₹150</h5>
          <br />
          <button class="add-to-cart">Add to Cart</button>
        </div>
      </div>
      <div class="card iteams">
        <img src="img/cowghee.png" alt="" />
        <h6 class="card--title">Cow Ghee</h6>
        <div class="card--price">
          <h5 class="price">₹350</h5>
          <br />
          <button class="add-to-cart">Add to Cart</button>
        </div>
      </div>
    </div>
    <div id="cream" class="heading6"><h2>Cream Products</h2></div>
    <div class="card--list creamproducts">
      <div class="card iteams">
        <img src="img/cream.png" alt="" />
        <h6 class="card--title">Cream</h6>
        <div class="card--price">
          <h5 class="price">₹100</h5>
          <br />
          <button class="add-to-cart">Add to Cart</button>
        </div>
      </div>
      <div class="card iteams">
        <img src="img/whippingcream.png" alt="" />
        <h6 class="card--title">Whipping Cream</h6>
        <div class="card--price">
          <h5 class="price">₹120</h5>
          <br />
          <button class="add-to-cart">Add to Cart</button>
        </div>
      </div>
      <div class="card iteams">
        <img src="img/sourcream.png" alt="" />
        <h6 class="card--title">Sour Cream</h6>
        <div class="card--price">
          <h5 class="price">₹120</h5>
          <br />
          <button class="add-to-cart">Add to Cart</button>
        </div>
      </div>
      <div class="card iteams">
        <img src="img/clottedcream.png" alt="" />
        <h6 class="card--title">Clotted Cream</h6>
        <div class="card--price">
          <h5 class="price">₹130</h5>
          <br />
          <button class="add-to-cart">Add to Cart</button>
        </div>
      </div>
    </div>
    <div id="nutrition" class="heading7"><h2>Nutritional Products</h2></div>
    <div class="card--list nutritionalproducts">
      <div class="card iteams">
        <img src="img/babyformula.png" alt="" />
        <h6 class="card--title">Infant Nutritional Powder</h6>
        <div class="card--price">
          <h5 class="price">₹200</h5>
          <br />
          <button class="add-to-cart">Add to Cart</button>
        </div>
      </div>
      <div class="card iteams">
        <img src="img/condensedmilk.png" alt="" />
        <h6 class="card--title">Condensed Milk</h6>
        <div class="card--price">
          <h5 class="price">₹230</h5>
          <br />
          <button class="add-to-cart">Add to Cart</button>
        </div>
      </div>
      <div class="card iteams">
        <img src="img/evaporatedmilk.png" alt="" />
        <h6 class="card--title">Evaporated Milk</h6>
        <div class="card--price">
          <h5 class="price">₹200</h5>
          <br />
          <button class="add-to-cart">Add to Cart</button>
        </div>
      </div>
      <div class="card iteams">
        <img src="img/milkpowder.png" alt="" />
        <h6 class="card--title">Milk Powder</h6>
        <div class="card--price">
          <h5 class="price">₹180</h5>
          <br />
          <button class="add-to-cart">Add to Cart</button>
        </div>
      </div>
      <div class="card iteams">
        <img src="img/proteinrich.png" alt="" />
        <h6 class="card--title">Protein Milk</h6>
        <div class="card--price">
          <h5 class="price">₹100</h5>
          <br />
          <button class="add-to-cart">Add to Cart</button>
        </div>
      </div>
      <div class="card iteams">
        <img src="img/proteinrichmilk.png" alt="" />
        <h6 class="card--title">Protein Milk Powder</h6>
        <div class="card--price">
          <h5 class="price">₹120</h5>
          <br />
          <button class="add-to-cart">Add to Cart</button>
        </div>
      </div>
    </div>
    <div id="eggs" class="heading8"><h2>Eggs</h2></div>
    <div class="card--list eggproducts">
      <div class="card iteams">
        <img src="img/egg.png" alt="" />
        <h6 class="card--title">White Eggs</h6>
        <div class="card--price">
          <h5 class="price">₹80</h5>
          <br />
          <button class="add-to-cart">Add to Cart</button>
        </div>
      </div>
      <div class="card iteams">
        <img src="img/brownegg.png" alt="" />
        <h6 class="card--title">Brown Eggs</h6>
        <div class="card--price">
          <h5 class="price">₹120</h5>
          <br />
          <button class="add-to-cart">Add to Cart</button>
        </div>
      </div>
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
  </body>
</html>
