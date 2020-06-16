<?php
include ('maincontroller.php');

?>
<!DOCTYPE html>
<html>
<head>
	<title id="title">Chat App</title>
	<!-- Font Awesome -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
<!-- Bootstrap core CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
<!-- Material Design Bootstrap -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.2/css/mdb.min.css" rel="stylesheet">

<link rel="stylesheet" href="https://cdn.rawgit.com/mervick/emojionearea/master/dist/emojionearea.min.css">

<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.js"></script>
<!-- JQuery -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.2/js/mdb.min.js"></script>
<script src="https://cdn.rawgit.com/mervick/emojionearea/master/dist/emojionearea.min.js"></script>
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
           echo'<form method="post"><button class="btn btn-secondary-color lighten-1 active" name="logout" >Logout</button></form>';
          }
          ?>



        </div>
      </li>
    </ul>
  </div>
</nav>
<!--/.Navbar -->

	<div style="margin-top: 2%"><h1 style="color: blue;"><center><strong>CHAT ROOM</strong><br></h1>
    <div style="display: flex; justify-content: center; align-items: center;">
    <?php
      echo '<div><img src="image/'.$_SESSION['photo'].'"alt="avatar" class="avatar rounded-circle d-flex align-self-center mr-2 z-depth-1" height=80px; width=80px;></div>';
      echo '<div><h4><b> '.strtoupper($_SESSION['name']).' <b></h4></div>';
    ?>
  </div>
  </center></div>
<div class="card rare-wind-gradient chat-room" style="margin-left:7%; margin-top:3%;margin-right:7%;">
  <div class="card-body">

    <!-- Grid row -->
    <div class="row px-lg-2 px-2">

      <!-- Grid column -->
      <div class="col-md-6 col-xl-4 px-0">

        <h6 class="font-weight-bold mb-3 text-center text-lg-left">Member</h6>
        <div class="white z-depth-1 px-2 pt-3 pb-0 members-panel-1 scrollbar-light-blue" style="height:500px; overflow-y: scroll;">


          <input type="hidden" id="is_active_group_chat_window" value="no"/>
          <button type="button"  id="groupchat" class="btn btn-warning btn-xs">Group Chat</button>

          <ul class="list-unstyled friend-list">
           <div id="showuser"></div>    
           
          </ul>
        </div>

      </div>
<div id="groupchatdialoge" class="col-md-6 col-xl-8 pl-md-3 px-lg-auto px-0" ></div>
     
      <!-- Grid column -->
      <!-- Grid column -->
      
    <!-- Grid row -->
</div>
  </div>

</div>


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
  $(document).ready(function () {

    $.ajax({
        url:'maincontroller.php',
        method:"POST",
        data:{"showuser":1},
        success:function (data) {
          $("#showuser").html(data);
        }
      });

    setInterval(function () {
      $.ajax({
        url:'maincontroller.php',
        method:"POST",
        data:{"updatelastactivity":1},
        success:function (data) {
                $.ajax({
                  url:'maincontroller.php',
                  method:"POST",
                  data:{"showuser":1},
                  success:function (data) {
                    $("#showuser").html(data);
                  }
                });
        }
      });
      updatechathistory();
      fetch_group_chat_history();
    },1000);
  });


$(document).on('click','#message',function () {
    var uid="";
   uid=$(this).data("showmessage");
   viewchatbox(uid);
   //$("#textmessage").emojionearea({pickerPosition:"top",toneStyle:"bullet"});   
});

function updatechathistory() {
  var uid=$("#chatmessage").data("uid");
  viewchathistory(uid);
}

function viewchatbox(uid) {
  var chatbox='<div  >';
      chatbox+='<div class="chat-message" id="chatmessage" style="height:500px; overflow-y: scroll;" data-uid="'+uid+'" >';
//chatbox+='<ul class="list-unstyled chat-1 scrollbar-light-blue" >';
chatbox+=viewchathistory(uid);
//chatbox+='</ul>
//chatbox+=
chatbox+='</div><br>';
 chatbox+='<div class="white"><div class="form-group basic-textarea"><textarea class="form-control chat_message" rows="3" placeholder="Type your message here..." id="textmessage"></textarea></div></div>';
  chatbox+='<button type="button" class="btn btn-outline-pink btn-rounded btn-sm waves-effect waves-dark float-right" data-send="'+uid+'" id="sendmessage">Send</button></div></div>';
$("#groupchatdialoge").html(chatbox);
}

function viewchathistory(uid) {
 
    $.ajax({
          url:'maincontroller.php',
          method:"POST",
          data:{"uid":uid,"displaymessage":1},
          success:function(data){
              $("#chatmessage").html(data);

          }
        });
}



$(document).on('click',"#sendmessage",function () {
  var sendid=$(this).data("send");
  var message=$("#textmessage").val();
  if (message!="") 
  {
    $.ajax({
      url:'maincontroller.php',
      method:"POST",
      data:{"insertmessage":1,"message":message,"touid":sendid},
      success:function(data){
        $("#textmessage").val("");
      }
    });

  }
});

$(document).on('keyup','#textmessage',function (e) {
  if(e.which==13)
    {
      var sendid=$("#sendmessage").data("send");
  var message=$("#textmessage").val();
  if (message!="") 
  {
    $.ajax({
      url:'maincontroller.php',
      method:"POST",
      data:{"insertmessage":1,"message":message,"touid":sendid},
      success:function(data){
        $("#textmessage").val("");
      }
    });

  }
    }
});

$(document).on('click','#edit',function () {
  
});

$(document).on('click','#delete',function () {
     var mid=$(this).data("mid");
     var message="Are you sure to delete this message.";
     if(confirm(message)){
    $.ajax({
      url:'maincontroller.php',
      method:"POST",
      data:{"messageid":mid,"deletemessage":1},
      success:function (data) {
        if(data==1)
        {
          alert("Message deleted.");
        }
        else
        {
          alert("Unsuccessfull to delete message.");
        }
      }
    });
  }
});


$(document).on('focus','#textmessage',function () {
  var is_type='yes';
  $.ajax({
    url:'maincontroller.php',
    method:"POST",
    data:{"is_type":is_type,"typing":1},
    success:function (data) {
 
    }
  });
});

$(document).on('blur','#textmessage',function () {
  var is_type='no';
  $.ajax({
    url:'maincontroller.php',
    method:"POST",
    data:{"is_type":is_type,"typing":1},
    success:function (data) {
      
    }
  });
});

$("#groupchat").click(function () {
  var show=' <b><center>WELCOME TO GROUP CHAT</center></b><div class="chat-message"id="groupchathistory" style="height:500px; overflow-y: scroll;" > </div><div class="white"><div class="form-group basic-textarea"><textarea class="form-control chat_message" rows="3" placeholder="Type your message here..." id="groupmessage"></textarea></div></div><button  class="btn btn-outline-pink btn-rounded btn-sm waves-effect waves-dark float-right" id="sendgroupmessage">Send</button></div>';
  $("#groupchatdialoge").html(show);
  $("#is_active_group_chat_window").val('yes');
  fetch_group_chat_history();
});

$(document).on('click','#sendgroupmessage',function () {
  var chat_message=$("#groupmessage").val();
  if(chat_message!="")
  {
    $.ajax({
      url:'maincontroller.php',
      method:"POST",
      data:{"chat_message":chat_message,"groupmessage":1},
      success:function (data) {
        $("#groupmessage").val("");
        $("#groupchathistory").html(data);
      }
    });
  }
});

function fetch_group_chat_history() {
  var group_chat_dialogue_active=$("#is_active_group_chat_window").val();
      if(group_chat_dialogue_active=="yes")
      {
        $.ajax({
          url:'maincontroller.php',
          method:"POST",
          data:{"groupchathistory":1},
          success:function (data) {
            $("#groupchathistory").html(data);
          }

        });
      }
}
</script>
