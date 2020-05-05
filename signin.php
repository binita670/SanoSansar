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

<h1><center><a href="index.php">Back</a></center></h1>



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

    <!-- Register -->
    <p>Not a member?
        <a href="">Register</a>
    </p>

    <!-- Social login -->
    <p>or sign in with:</p>

    <a href="#" class="mx-2" role="button"><i class="fab fa-facebook-f light-blue-text"></i></a>
    <a href="#" class="mx-2" role="button"><i class="fab fa-twitter light-blue-text"></i></a>
    <a href="#" class="mx-2" role="button"><i class="fab fa-linkedin-in light-blue-text"></i></a>
    <a href="#" class="mx-2" role="button"><i class="fab fa-github light-blue-text"></i></a>

</div>
<!-- Default form login -->
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