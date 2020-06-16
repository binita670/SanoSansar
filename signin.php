<?php
include('maincontroller.php');
?>


<!DOCTYPE html>
<html>
<head>
    <title>Chat App</title>
    <!-- Font Awesome -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
<!-- Bootstrap core CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
<!-- Material Design Bootstrap -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.2/css/mdb.min.css" rel="stylesheet">


<!-- JQuery -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="mdb.js"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.js"></script>
</head>
<body>


<!--Navbar -->
<nav class="mb-1 navbar navbar-expand-lg navbar-dark secondary-color lighten-1 active">
  
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-333"
    aria-controls="navbarSupportedContent-333" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent-333">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Sano Sansar
        </a>
    </ul>
    <ul class="navbar-nav ml-auto nav-flex-icons">
      
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">
         <i class="fas fa-user"></i>
        </a>

        <div class="dropdown-menu dropdown-menu-right dropdown-default"
          aria-labelledby="navbarDropdownMenuLink-333" style="margin-top: 7px; padding: 3px 3px 3px 3px;">

          <a class="dropdown-item" href="signin.php">Login</a>
          <a class="dropdown-item" href="signup.php">Register</a>


        </div>
      </li>
    </ul>
  </div>
</nav>
<!--/.Navbar -->




<div style="margin-left:35%;margin-right: 35%; margin-top:10%">
    <!-- Default form login -->
<div class="text-center border border-light p-5" >

    <p class="h4 mb-4">Sign in</p>

    <!-- Email -->
    <input type="email"  class="form-control mb-3" placeholder="E-mail" name="email" id="email">
    <small id="eemail" style="color: red;"></small>
    <!-- Password -->
    <input type="password"  class="form-control mb-3" placeholder="Password" name="password" id="password">
    <i class="fas fa-eye" id="seen"></i>
<small id="ppassword" style="color: red;"></small>
<br><br>
    <div class="d-flex justify-content-around">
        <div>
            <!-- Remember me -->
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input">
                <label class="custom-control-label" for="defaultLoginFormRemember">Remember me</label>
            </div>
        </div>
        <div>
            <!-- Forgot password -->
            <a href="">Forgot password?</a>
        </div>
    </div>

    <!-- Sign in button -->
    <button class="btn btn-info btn-block my-4" name="signin" id="signin">Sign in</button>
    <br>
    <!-- Register -->
    <p>Not a member?
        <a href="signup.php">Register</a>
    </p>


</div>
<!-- Default form login -->
</div>
</li>
</ul>
</div>
</nav>
<!-- Footer -->
<footer class="page-footer font-small secondary-color lighten-1 active" style="margin-top: 20px;">

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3">© 2020 Copyright:
    <a href="https://mdbootstrap.com/"> Sanosansar.com</a>
  </div>
  <!-- Copyright -->

</footer>
<!-- Footer -->
</body>
</html>

<script type="text/javascript">
$("#signin").click(function () {
    var email=$("#email").val();
    var password=$("#password").val();
    if(email=="")
    {
        $("#eemail").text("Please fill the email.");
    }
    if(password=="")
    {
        $("#ppassword").text("Please fill the password");
    }
    if(email!=""&& password!="")
    {
        $.ajax({
            url:'maincontroller.php',
            method:'POST',
            data:{"email":email,"password":password,"signin":1},
            success:function (data) {
                if(data==1)
                {
                    window.location.replace("chat.php");
                }
                else
                {
                    alert("Username and Password donot match.");     
            }
        }
        });
    }
});

$("#email").keypress(function () {
    $("#eemail").text("");
    
});
$("#password").keypress(function () {
    $("#ppassword").text("");
});

$("#seen").click(function () {
    if($("#password").attr("type")=="password")
    {
        $("#seen").removeClass("fas fa-eye");
        $("#seen").addClass("fas fa-eye-slash");
        $("#password").attr("type","text");
    }
    else
    {
         $("#seen").removeClass("fas fa-eye-slash");
         $("#seen").addClass("fas fa-eye");
        $("#password").attr("type","password");
    }
});
</script>