<?php
session_start();
if (isset($_POST['submit'])) {
  $conn = mysqli_connect('localhost:3306', 'root', '', 'project');
  $user = $_POST['u_name'];
  $pass = $_POST['pass'];
  $user = stripcslashes($user);
  $pass = stripcslashes($pass);
  $user = mysqli_real_escape_string($conn, $user);
  $pass = mysqli_real_escape_string($conn, $pass);
  $_SESSION['u_name'] = $_POST['u_name'];
  $_SESSION['pass'] = $_POST['pass'];
  $error = "";
  $query = "SELECT pass from register where u_name = '$user' and pass = '$pass' ";
  $query_run = mysqli_query($conn, $query);
  if (mysqli_num_rows($query_run)) {
    header('Location:index.php');
  } else {
    $error = "Sorry the credentials you are using are invalid.";
  }
  mysqli_close($conn);
}
  if (isset($_POST['registernow'])) {
    $conn = mysqli_connect('localhost:3306', 'root', '', 'project');
    $user = $_POST['u_name'];
    $pass = $_POST['pass'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['mail'];
    $mobile = $_POST['mobile'];
    $fname = stripcslashes($fname);
    $lname = stripcslashes($lname);
    $email = stripcslashes($email);
    $mobile = stripcslashes($mobile);
    $user = stripcslashes($user);
    $pass = stripcslashes($pass);
    $fname = mysqli_real_escape_string($conn, $fname);
    $lname = mysqli_real_escape_string($conn, $lname);
    $email = mysqli_real_escape_string($conn, $email);
    $mobile = mysqli_real_escape_string($conn, $mobile);
    $user = mysqli_real_escape_string($conn, $user);
    $pass = mysqli_real_escape_string($conn, $pass);
    $query = "INSERT INTO register (fname,lname,mail,mobile,u_name,pass) values ('$fname','$lname','$email','$mobile','$user','$pass')";
    $query_run = mysqli_query($conn, $query);
    mysqli_close($conn);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    
<header>
    <div class="logo">
        <a href="index.php"><img src="DMX-sports-logo.jpg" alt="logo"></a>
    </div>
    <div class="navigation">
        <ul>
            <li><input type="search" name="search" placeholder=" Search for clothing, shoes, equipments"> <button id="btn"> <a href="#"><i class="fa fa-search fa-lg" aria-hidden="true"></i></a></button></li>
            <li><a class="nav_link" href="index.php">Home</a></li>
            <li><a class="nav_link" href="contact.html">Contact Us</a></li>
        </ul>
    </div>
</header><hr>


<div class="back">
    <img src="run.png" alt="2 people running">
    <h1>Login</h1>
    <form action="#" method="POST">
    <div class="textbox">
        <i class="fa fa-user-circle" aria-hidden="true"></i>
        <input type="text" name="u_name" placeholder="Username" required>
    </div>
    <div class="textbox">
        <i class="fa fa-lock" aria-hidden="true"></i>
        <input type="password" name="pass" placeholder="Enter password" required>
    </div>
    <button id="myBtn">Register</button>
    <p><button class="pad" type = "submit" name="submit">Sign In</button></p>
    </form>
</div>



    <!-- The Modal -->
<div id="myModal" class="modal">
    
      <!-- Modal content -->
    <div class="modal-content">
        <span class="close">&times;</span>
        <form action="#" method = "POST">
        <h1>Fill up the details</h1>
      <div>
        <div class="fill">
            <input type="text" placeholder="First Name" name="fname" required>
        </div>
        <div class="fill">
            <input type="text" placeholder="Last Name" name="lname" required>
        </div>
      </div>
    
      <div>
        <div class="fill">
            <input type="email" placeholder="Enter email id" name="mail" required>
        </div>
    
        <div class="fill">
            <input type="tel" placeholder="Enter mobile number" name="mobile" required>
        </div>
      </div>
    
      <div>
        <div class="fill">
            <input type="text" placeholder="Enter username" name="u_name" required>
        </div>
    
        <div class="fill">
            <input type="password" placeholder="Enter password" name="pass" required>
        </div>
      </div>
    
      <button type="submit" class="shift" name="registernow">Register Now</button>
    
      </form>
    </div>
</div>
    

<footer>
    <div class="sup">
        <h3>SUPPORT</h3>
        <a href="contact.html"><p>Contact Store</p></a>
        <a href="delivery.html"><p>Delivery</p></a>
        <a href="#"><p>Packaging</p></a>
    </div>
  
    <div class="service">
        <h3>Our Services</h3>
        <p>Doorstep Delivery</p>
        <p>30 days replacement/return</p>
        <p>Minimum 6 months warranty</p>
    </div>
  
    <div class="social">
        <h3>FOLLOW US:</h3>
        <p><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i> Instagram</a></p>
        <p><a href="#"><i class="fa fa-facebook-official" aria-hidden="true"></i> Facebook</a></p>
        <p><a href="#"><i class="fa fa-twitter-square" aria-hidden="true"></i> Twitter</a></p>
    </div>
  
    <div class="app">
        <h3>Experience DMX Sports App on Mobile</h3>
        <a href="https://play.google.com/store"><img src="play.png" alt="Play Store"></a><br>
        <a href="https://www.apple.com/in/app-store/"><img src="app.svg" alt="App store"></a>
    </div>
  </footer>
  
  <div class="copy">
    <p>2020 &copy; DMX Sports India Pvt. Ltd. All Rights Reserved</p>
  </div>


<script>
    // Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];


var shift = document.getElementsByClassName("shift")[0];

// When the user clicks on the button, open the modal
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}


shift.onclick = function() {
  modal.style.display = "none";
  alert('Your account has been registered!')
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}


</script>

</body>
</html>