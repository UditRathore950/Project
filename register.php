<?php session_start(); ?>


<?php

include 'connect.php';

if(isset($_POST['signUp'])){
    $firstName=$_POST['fName'];
    $lastName=$_POST['lName'];
    $email=$_POST['email'];
    $number=$_POST['number'];
    $address=$_POST['address'];
    $password=$_POST['password'];
    $password=($password);

    $checkEmail="SELECT * FROM users where email='$email'";
    $result=$conn->query($checkEmail);
    if($result->num_rows>0){
        echo "Email Address Already Exists!";
    }
    else{
        $insertQuery="INSERT INTO users(firstName,lastName,email,number,address,password)
                        VALUES ('$firstName','$lastName','$email','$number','$address','$password')";
            if($conn->query($insertQuery)==TRUE){
                $_SESSION['email'] = $email;
                header("Location: login.php");
                exit();
            } 
            else{
                echo "Error:".$conn->error;
            }           
    }
}

if(isset($_POST['signIn'])){
   $email=$_POST['email'];
   $password=$_POST['password'];
   $password=($password);
   
   $sql="SELECT * FROM users WHERE email='$email' and password='$password'";
   $result=$conn->query($sql);
   if($result->num_rows>0){
    session_start();
    $row=$result->fetch_assoc();
    $_SESSION['email']=$row['email'];
    header("Location: index.php");
    exit();
   }
   else{
    echo "Not Found, Incorrect Email or Password";
   }
}
?>