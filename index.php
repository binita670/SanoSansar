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
      </li>
      <?php
       if(isset($_SESSION['user']))
       {
          echo'<li class="nav-item active">
        <a class="nav-link" href="chat.php">Chat Room
        </a>
      </li>';
       }
      ?>
     

    </ul>
    <ul class="navbar-nav ml-auto nav-flex-icons">
      
       <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">
        
         <?php
          if(isset($_SESSION['user']))
          {
            echo '<b> '.strtoupper($_SESSION['name']).'</b>&nbsp &nbsp &nbsp';
            echo'<img src="image/'.$_SESSION['photo'].'" class="rounded-circle z-depth-0"
                alt="avatar image" height="35">';
          }
          else
          {
            echo' <i class="fas fa-user"></i>
            ';
          }
         ?>
        </a>

        <div class="dropdown-menu dropdown-menu-right dropdown-default"
          aria-labelledby="navbarDropdownMenuLink-333" style="margin-top: 7px; padding: 3px 3px 3px 3px;">
          <?php
          if(!isset($_SESSION['user']))
          {
          echo'<a class="dropdown-item" href="signin.php">Login</a>
            <a class="dropdown-item" href="signup.php">Register</a>';
          }
          else{
           echo '<form method="post"><button class="btn btn-secondary-color" name="logout" >Logout</button></form>';
          }
          ?>


        </div>
      </li>
    </ul>
  </div>
</nav>
<!--/.Navbar -->

</center>
</li>
</ul>
</div>
</nav>

<div class="container">
  <br>
  <h1 style="color: red;"><center><strong>Sano Sansar</strong> </center> </h1>
  <div  style="margin-bottom: 20px; margin-top:20px;">
  <h5>Messaging apps (a.k.a. "social messaging" or "chat applications") are apps and platforms that enable instant messaging. Many such apps have developed into broad platforms enabling status updates, chatbots, payments and conversational commerce (e-commerce via chat). </h5>
  <h5>Some examples of popular messaging apps include WhatsApp, Facebook Messenger, China's WeChat and QQ Messenger, Telegram, Viber, Line, and Snapchat. Certain apps have emphasis on certain uses - for example Skype focuses on video calling, Slack focuses on messaging and file sharing for work teams, and Snapchat focuses on image messages.
  </h5>
  <h5 style="color: green;"><b> Similary, Sanosansar is a simple chat app that is build using html, bootstrap, php, jQuery. It intendes to provide an interface for communication between friends, family and other people.  
  </b></h5>
 </div>
</div>

<!--Carousel Wrapper-->
<div class="container">
<div id="carousel-example-1z" class="carousel slide carousel-fade" data-ride="carousel" style="margin-top: -5px;">
  <!--Indicators-->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-1z" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-1z" data-slide-to="1"></li>
    <li data-target="#carousel-example-1z" data-slide-to="2"></li>
  </ol>
  <!--/.Indicators-->
  <!--Slides-->
  <div class="carousel-inner" role="listbox">
    <!--First slide-->
    <div class="carousel-item active">
      <img class="d-block w-100" src="image/chat.jpg" alt="First slide">
    </div>
    <!--/First slide-->
    <!--Second slide-->
    <div class="carousel-item">
      <img class="d-block w-100" src="image/chat1.jpg" alt="Second slide">
    </div>
    <!--/Second slide-->
    <!--Third slide-->
    <div class="carousel-item">
      <img class="d-block w-100" src="image/chat2.jpg" alt="Third slide">
    </div>
    <!--/Third slide-->
  </div>
  <!--/.Slides-->
  <!--Controls-->
  <a class="carousel-control-prev" href="#carousel-example-1z" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carousel-example-1z" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
  <!--/.Controls-->
</div>
<!--/.Carousel Wrapper-->

</div>

<!-- Footer -->
<footer class="page-footer font-small secondary-color lighten-1 active" style="margin-top: 30px;">

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3">© 2020 Copyright:
    <a href="https://mdbootstrap.com/"> Sanosansar.com</a>
  </div>
  <!-- Copyright -->

</footer>
<!-- Footer -->

</body>
</html>