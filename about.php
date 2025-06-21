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

      .aboutus {
        text-align: center;
      }
      .aboutus h1 {
        padding: 1.5rem;
        font-size: 80px;
      }
      .container1 {
        display: flex;
        margin: 5rem 12rem;
        border: 1px solid black;
      }
      .container1 img {
        height: 590px;
        width: auto;
      }
      .paragraph {
        padding: 3rem;
        text-align: justify;
      }
      .container2 {
        display: grid;
        grid-template-columns: auto auto auto;
        gap: 0;
        padding: 2rem;
        margin: 4rem 7rem;
      }
      .content {
        border: 1px solid black;
        padding: 2rem 3rem 2rem 1rem;
      }
      .content i {
        font-size: 2.5rem;
        color: red;
      }
      .content p {
        text-align: justify;
      }
      .container3 {
        background-color: rgb(254, 239, 210);
        margin: 2rem 10rem 5rem 10rem;
        display: flex;
        align-items: center;
        padding: 1rem;
        justify-content: space-evenly;
      }
      .image img {
        height: 350px;
        width: auto;
      }
      .content1 {
        font-size: x-large;
      }
      .content1 a {
        background-color: rgb(235, 20, 20);
        border-radius: 4rem;
        padding: 0.5rem 2rem;
        text-decoration: none;
        color: white;
      }
      /*  */
      /*  */

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

    <div class="aboutus">
      <h1>About Us</h1>
    </div>
    <div class="container1">
      <img src="img/dairy18.jpg" alt="" />
      <div class="paragraph">
        <h1>DailyDairy.</h1>
        <br />
        <p>
          At DailyDairy, dairy is more than just a product—it’s a promise of
          purity, nutrition, and care that begins on the farm and ends at your
          table. Founded with a passion for wholesome living and a deep respect
          for nature, we work closely with local farmers who share our values of
          ethical animal care and sustainable farming practices. <br />
          <br />
          Every drop of milk we use comes from cows that are pasture-raised and
          treated with kindness, ensuring not only their health but the
          exceptional quality of our dairy. From fresh milk and butter to rich
          yogurts and artisanal cheeses, each product is crafted with minimal
          processing to preserve its natural goodness and taste. We are proud to
          be a brand that families trust, delivering dairy that’s free from
          harmful additives, responsibly sourced, and full of flavor. Whether
          you’re sipping, spreading, or cooking, we’re here to bring you dairy
          that’s honest, delicious, and rooted in tradition.
        </p>
      </div>
    </div>
    <div class="container2">
      <div class="content">
        <i class="fa-solid fa-truck"></i><br /><br />
        <h2>Delivering Freshness Every Day at a Time</h2>
        <br />
        <p>
          At Delivering Freshness Every Day at a Time, our mission is simple: to
          bring the highest quality, farm-fresh produce and products straight to
          your doorstep, one delivery at a time. We believe freshness isn’t just
          a promise—it’s a lifestyle. That’s why we work closely with local
          growers, bakers, and artisans to ensure that every item we deliver is
          packed with flavor, nutrients, and care. From crisp vegetables to
          just-baked bread, our daily deliveries are thoughtfully curated to
          provide the freshest experience possible, helping you and your family
          live healthier, happier lives—every single day.
        </p>
      </div>
      <div class="content">
        <i class="fa-solid fa-recycle"></i><br /><br />
        <h2>We Take Sustainability Seriously</h2>
        <br />
        <p>
          At We Take Sustainability Seriously, our commitment to the planet is
          at the heart of everything we do. From sourcing eco-friendly materials
          to minimizing waste in our operations, we’re dedicated to creating a
          greener future—one conscious choice at a time. We partner with
          sustainable farms, use recyclable packaging, and continuously seek
          innovative ways to reduce our carbon footprint. Every step we take is
          guided by the belief that business should be a force for good, not
          just for today, but for generations to come. Because for us,
          sustainability isn’t a trend—it’s a responsibility we proudly uphold.
        </p>
      </div>
      <div class="content">
        <i class="fa-solid fa-basket-shopping"></i><br /><br />
        <h2>Supporting Local Products</h2>
        <br />
        <p>
          At *Supporting Local Products*, we believe that strong communities
          start with strong local economies. That’s why we proudly champion the
          work of local farmers, artisans, and small businesses by bringing
          their goods directly to you. Every product we offer tells a story of
          craftsmanship, care, and community spirit. By choosing local, we’re
          not only ensuring fresher, higher-quality items—we’re also helping to
          preserve traditions, create jobs, and reduce environmental impact.
          It’s our way of investing in the people and places that make our
          neighborhoods truly special.
        </p>
      </div>
    </div>
    <div class="container3">
      <div class="image"><img src="img/milkbottle.png" alt="" /></div>
      <div class="content1">
        <h1>Save every day!</h1>
        <br />
        <h3>
          Help lower the cost of your shopping cart with <br />
          our daily specials
        </h3>
        <br /><br />
        <a href="shop.php">Shop Now</a>
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
