<?php
    require 'PHPMailerAutoload.php';
    
    $mail = new PHPMailer;
    $mail->isSMTP();  //using local server
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 587;
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';
    
    $mail->Username = 'thenxecommerce123@gmail.com';
    $mail->Password = 'thenx123';

    if(isset($_POST['send_message'])){

        $mail->setFrom($_POST['email'],$_POST['name']);
        $mail->addAddress('thenxecommerce123@gmail.com');  //send to the user email
        $mail->addReplyTo($_POST['email'],$_POST['name']);

        $mail->isHTML(true);
        $mail->Subject = $_POST['subject'];
        $mail->Body = $_POST['message'];

        //send
        if(!$mail->send()){
            echo "<script>alert('Something went wrong!');</script>";
        }
        else{
            echo "<script>alert('Your messages have been sent, we will get back to you soon. Thank you for contacting us!');</script>";
        }

    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>contact</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">

</head>
<body>
    
<div class="container">

<header>

    <a href="home.php" class="logo">EduSuper<span>Hero</span></a>

    <div id="menu" class="fas fa-bars"></div>

    <nav class="navbar">
        <a href="home.php">home</a>
        <a href="course.php">courses</a>
        <!-- <a href="teacher.html">teachers</a> -->
        <a href="about.php">about</a>
        <a href="contact.php">contact</a>
    </nav>

</header>

<h1 class="heading">contact us</h1>

<!-- contact section  -->

<section class="contact">

<div class="image">
    <img src="images/contact.png" alt="">
</div>

<form action="" method="POST">

    <div class="inputBox">
        <input type="text" name="name" placeholder="name">
        <input type="email" name="email" placeholder="email">
    </div>

    <input type="text" placeholder="subject" name="subject" class="box">

    <textarea placeholder="message" name="message" id="" cols="30" rows="10"></textarea>

    <input type="submit" class="btn" name="send_message" value="send">

</form>

</section>


<!-- footer section  -->

<section class="footer">

    <?php include("footer.php"); ?>

</section>

</div>

<!-- custom js file link -->
<script src="js/script.js"></script>

</body>

</html>