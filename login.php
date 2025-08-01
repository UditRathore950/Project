<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Register & Login</title>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
      integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <link rel="stylesheet" href="style.css" type="text/css" />
  </head>
  <body>
    <div class="container" id="signUp" style="display: none">
      <h1 class="form-title">Register</h1>
      <form method="POST" action="register.php">
        <div class="input-group">
          <i class="fas fa-user"></i>
          <input
            type="text"
            name="fName"
            id="fName"
            placeholder="First Name"
            required
          />
          <label for="fName">First Name</label>
        </div>
        <div class="input-group">
          <i class="fas fa-user"></i>
          <input
            type="text"
            name="lName"
            id="lName"
            placeholder="Last Name"
            required
          />
          <label for="lName">Last Name</label>
        </div>
        <div class="input-group">
          <i class="fas fa-envelope"></i>
          <input
            type="email"
            name="email"
            id="email"
            placeholder="Email"
            required
          />
          <label for="email">Email</label>
        </div>
        <div class="input-group">
          <i class="fas fa-phone"></i>
          <input
            type="tel"
            name="number"
            id="number"
            placeholder="Number"
            pattern="[6-9]{1}[0-9]{9}"
            required
          />
          <label for="number">Number</label>
        </div>
        <div class="input-group">
          <i class="fas fa-location-dot"></i>
          <input
            type="text"
            name="address"
            id="address"
            placeholder="Address"
            required
          />
          <label for="address">Address</label>
        </div>
        <div class="input-group">
          <i class="fas fa-lock"></i>
          <input
            type="password"
            name="password"
            id="password"
            placeholder="Password"
            required
          />
          <label for="password">Password</label>
        </div>
        <input type="submit" class="btn" value="Sign Up" name="signUp" />
      </form>
      <p class="or">---------or---------</p>
      <div class="icons">
        <i class="fab fa-google"></i>
        <i class="fab fa-facebook"></i>
      </div>
      <div class="links">
        <p>Already Have Account ?</p>
        <button id="signInButton">Sign In</button>
      </div>
    </div>

    <div class="container" id="signIn">
      <h1 class="form-title">Sign In</h1>
      <form method="POST" action="register.php">
        <div class="input-group">
          <i class="fas fa-envelope"></i>
          <input
            type="email"
            name="email"
            id="email"
            placeholder="Email"
            required
          />
          <label for="email">Email</label>
        </div>
        <div class="input-group">
          <i class="fas fa-lock"></i>
          <input
            type="password"
            name="password"
            id="password"
            placeholder="Password"
            required
          />
          <label for="password">Password</label>
        </div>
        <p class="recover">
          <a href="#">Recover Password</a>
        </p>
        <input type="submit" class="btn" value="Sign In" name="signIn" />
      </form>
      <p class="or">---------or---------</p>
      <div class="icons">
        <i class="fab fa-google"></i>
        <i class="fab fa-facebook"></i>
      </div>
      <div class="links">
        <p>Don't have account yet ?</p>
        <button id="signUpButton">Sign Up</button>
      </div>
    </div>

    <script src="script.js"></script>
  </body>
</html>
