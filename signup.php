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
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.2/js/mdb.min.js"></script>
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

    <div style="margin-left:35%;margin-right: 35%; margin-top: 5%">
	<!-- Default form register -->
<div class="text-center border border-light p-5" >

    <p class="h4 mb-4">Sign up</p>

    <div class="form-row mb-4">
        <div class="col">
            <!-- First name -->
            <input type="text" class="form-control" placeholder="First name" name="fname" id="fname">
             <small id="ffname" style="color: red"></small>
        </div>
       
        <div class="col">
            <!-- Last name -->
            <input type="text" class="form-control" placeholder="Last name" name="lname" id="lname">
            <small id="llname" style="color: red"></small>
        </div>
        
    </div>

    <!-- E-mail -->
    <input type="email"  class="form-control mb-4" placeholder="E-mail" name="email" id="email">
<small id="eemail" style="color: red"></small>
    <!-- Password -->
    <input type="password" id="password" class="form-control" placeholder="Password" aria-describedby="defaultRegisterFormPasswordHelpBlock" name="password"> 
    <small id="ppassword" style="color: red"></small> 
    <br>
       <input type="password" id="cpassword" class="form-control" placeholder=" Confrim Password" aria-describedby="defaultRegisterFormPasswordHelpBlock" name="confirmpassword">
       <small id="ccpassword" style="color: red"></small>

 <br>

     <input type="file" name="photo" accept="image/*" style="margin-left: 50px;"id="photo">
     <small id="pphoto"style="color: red"></small>
     <br>
    <br>

      
    <!-- Sign up button -->
    <button class="btn btn-info my-4 btn-block" name="signup" id="signup">Sign up</button>


    

    <hr>

    <!-- Terms of service -->
    <p>By clicking
        <em>Sign up</em> you agree to our
        <a href="" target="_blank">terms of service</a>

</p>
</div>
<!-- Default form register -->
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
    $("#signup").click(function () {
        var fname=$("#fname").val();
        var lname=$("#lname").val();
        var email=$("#email").val();
        var password=$("#password").val();
        var cpassword=$("#cpassword").val();
        var photo=$("#photo").val().split('\\').pop();
        if(fname=="")
        {
            $("#ffname").text("Please enter first name");
        }
        if(lname=="")
        {
            $("#llname").text("Please enter last name");
        }
        if(email=="")
        {
            $("#eemail").text("Please enter email");
        }
         if(password=="")
        {
            $("#ppassword").text("Please enter password");
        }
         if(cpassword=="")
        {
            $("#ccpassword").text("Please enter password");
        }
        
        if(photo=="")
        {
            $("#pphoto").text("Please upload image.");
        }
        if(fname!=""&& lname!="" && email!="" && password!=""&& cpassword!=""&&password.length>=8)
        {
            $.ajax({
                url:'maincontroller.php',
                method:"POST",
                data:{"fname":fname,"lname":lname,"email":email,"password":password,"photo":photo,"signup":1},
                success:function (data) {
                    if(data==1)
                    {
                        alert("Sign up successfull");
                        window.location.replace("index.php");
                    }
                    else if(data==0)
                    {
                        alert("Email already exist.");
                    }
                    else
                    {
                        alert("Sign up unsuccessful");
                    }
                }

            });
        }
    });

$("#fname").keypress(function () {
    $("#ffname").text("");
});

$("#lname").keypress(function () {
    $("#llname").text("");
});

$("#email").keypress(function () {
    $("#eemail").text("");
});

$("#photo").click(function () {
    $("#pphoto").text("");
});
$("#password").keypress(function () {
    if(password=="")
    $("#ppassword").text("");
});

$("#cpassword").keypress(function () {
    $("#ccpassword").text("");
});

$("#password").keyup(function () {
    setTimeout(function () {
        var tpassword=$("#password").val();
        if(tpassword.length<7)
        {
            $("#ppassword").text("Password Weak");
            $("#ppassword").css("color","red");
        }
        else
        {
            $("#ppassword").text("Password Okay!");
            $("#ppassword").css("color","green");
        }
    },2000);
    var password=$("#password").val();
         var cpassword=$("#cpassword").val();
         if(password!=cpassword)
         {
            $("#ccpassword").text("Password donot match.");
             $("#ccpassword").css("color","red");
         }
         else
         {
            $("#ccpassword").text("Password matched.");
            $("#ccpassword").css("color","green");
         }
    var password=$("#password").val();
         var cpassword=$("#cpassword").val();
         if(password!=cpassword && cpassword.length!=0)
         {
            $("#ccpassword").text("Password donot match.");
             $("#ccpassword").css("color","red");
         }
         else if(cpassword.length!=0)
         {
            $("#ccpassword").text("Password matched.");
            $("#ccpassword").css("color","green");
         }
});

$("#cpassword").keyup(function () {
         var password=$("#password").val();
         var cpassword=$("#cpassword").val();
         if(password!=cpassword && cpassword.length!=0)
         {
            $("#ccpassword").text("Password donot match.");
             $("#ccpassword").css("color","red");
         }
         else if(cpassword.length!=0)
         {
            $("#ccpassword").text("Password matched.");
            $("#ccpassword").css("color","green");
         }
});
</script>