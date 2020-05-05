<?php
session_start();
$db=mysqli_connect('localhost','root','','chat');

//'utf8mb4'
if(isset($_POST['signup']))
{
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$email=$_POST['email'];
	$password=$_POST['password'];
	$photo=$_POST['photo'];
	$query="SELECT * FROM chat WHERE email='$email'";
	$result=mysqli_query($db,$query);
		if(mysqli_num_rows($result)==0)
		{
			$encript=md5($password);
			$query1="INSERT INTO chat(fname,lname,email,picture,password) VALUES('$fname','$lname','$email','$photo','$encript')";
			$result1=mysqli_query($db,$query1);
			if($result1)
			{
				echo 1;
			}
			
		}
			else
			{
				echo 0;

			}

}

if (isset($_POST['signin']))
{
	$email=$_POST['email'];
	$password=$_POST['password'];
		$encriptpassword=md5($password);
		$query="SELECT * FROM chat where email='$email' AND password='$encriptpassword'";
		$result=mysqli_query($db,$query);
		
		if(mysqli_num_rows($result)==1)
		{	
			$row=$result->fetch_assoc();
			$uid=$row['uid'];
			$_SESSION['user']=$uid;
			$_SESSION['name']=$row['fname']." ".$row['lname'];
			$_SESSION['photo']=$row['picture'];
			$query1="INSERT INTO logindetail(uid,timestamp) VALUES('$uid',now())";
			$result1=mysqli_query($db,$query1);
			$_SESSION['login']=mysqli_insert_id($db);
			echo '1';
		}
		else
		{
			echo '0';
		}
}

if (isset($_POST['showuser']))
{ 
	$output="";
	$db=mysqli_connect('localhost','root','','chat');
	$session=$_SESSION['user'];
	$query="SELECT * FROM chat WHERE uid!='$session'";
	$result=mysqli_query($db,$query);
	if(mysqli_num_rows($result)>0)
	{
		while($row=$result->fetch_assoc())
		{
			$uid=$row['uid'];
			$output.='

			<li class="active grey lighten-3 p-2">
              <a href="#" class="d-flex justify-content-between" data-showmessage="'.$row['uid'].'" id="message">
                <img src="image/'.$row['picture'].'" alt="avatar" class="avatar rounded-circle d-flex align-self-center mr-2 z-depth-1" height=100px; width=100px;>
                <div class="text-small">
                
                  <strong>'.$row['fname']." ".$row['lname'].'</strong>
                  '.fetch_is_type_status($uid).'
                  '.lastshowmessage($uid,$session).'
                  
                </div>
                <div class="chat-footer">
                  <p class="text-smaller text-muted mb-0">';

			            
						$lastactivity=showlastactivity($uid);
						date_default_timezone_set("Asia/Kathmandu");
						$currenttime=date("Y-m-d H:i:sa",strtotime("-10 sec"));
						if ($lastactivity>=$currenttime)
						{
							$output.='<span class="badge badge-success float-right">Online</span>';
						}
						else
						{
							$output.='<span class="badge badge-danger float-right">Offline</span>';
							
						}
                  $output.='</p>
           			<div >
                   '.count_unseen_message($uid,$session).'</div>
                </div>
              </a>
            </li>';
			}
		echo $output;
	}
}
//class="badge badge-danger float-right"
function showlastactivity($uid)
{
	$db=mysqli_connect('localhost','root','','chat');
	$query1="SELECT * FROM logindetail WHERE uid='$uid' ORDER BY detailid DESC LIMIT 1";
	$result1=mysqli_query($db,$query1);
	$row=$result1->fetch_assoc();
	$time=$row['timestamp'];
	return $time;
}

if (isset($_POST['updatelastactivity']))
{
	$loginid=$_SESSION['login'];
	$query="UPDATE logindetail SET timestamp=now() WHERE detailid='$loginid'";
	$result=mysqli_query($db,$query);
	if($result)
	{
		echo 1;
	}
}

if (isset($_POST['displaymessage']))
{
	$output="";
	$uid=$_POST['uid'];
	$ownuid=$_SESSION['user'];
	$query="SELECT * FROM message WHERE (fromuid='$uid' AND touid='$ownuid') OR (fromuid='$ownuid' AND touid='$uid')";
	$result=mysqli_query($db,$query);
	$query1="SELECT * FROM chat WHERE uid='$uid'";
	$result1=mysqli_query($db,$query1);
	$row1=$result1->fetch_assoc();
	if(mysqli_num_rows($result)>0)
	{

		while($row=$result->fetch_assoc())
		{

			
            if($row['fromuid']==$ownuid)
            {
	            $output.='

	            <li class="d-flex justify-content-between mb-4">
              <div class="chat-body white p-3 z-depth-1" style="width:700px;">
                <div class="header">
                  <strong class="primary-font">'.$_SESSION['name'].'</strong> &nbsp &nbsp
                  <b><small  style="color:red;"><i class="far fa-clock"></i> '.$row['timestamp'].'</small></b>
                  
                  
                </div>
                <hr class="w-100">
                <p height=100px; width=100px;>';
                if($row['deleted']==1)
                {
                	$output.='<div style="color:blue;">'.$row['deletedby'].'&nbsp deleted the message.</div>';
                }
                else{

                $output.=$row['message'];
                $output.='<button class="badge badge-danger float-right" id="delete" data-mid="'.$row['mid'].'">Delete</button>&nbsp &nbsp
                  <button class="badge badge-success float-right" id="edit">Edit</button>';
                if($row['status']==1){
                	$output.='<br><b><small style="float:right;"><i class="fas fa-check-double"></i> &nbsp<em>seen</em></small></b>';
                }
             	else
             	{
             		$output.='<br><b><small style="float:right;"><i class="fas fa-check"></i>&nbsp<em>sent<em></small></b>';
             	}
             	}
             	$output.='
                </p>
              </div>
              <img src="image/'.$_SESSION['photo'].'" alt="avatar" class="avatar rounded-circle mr-0 ml-3 z-depth-1" height=100px; width=100px;>
            </li>
	            ';	
	        }
	        else
	        {
	        	$output.='
	        	<li class="d-flex justify-content-between mb-4">
              <img src="image/'.$row1['picture'].'" alt="avatar" class="avatar rounded-circle mr-2 ml-lg-3 ml-0 z-depth-1" height=100px; width=100px;>
              <div class="chat-body white p-3 ml-2 z-depth-1"style=" width:600px;margin-right:10%;" >
                <div class="header">
                  <strong class="primary-font">'.$row1['fname']." ".$row1['lname'].'</strong>&nbsp &nbsp
                  <b><small  style="color:red;"><i class="far fa-clock"></i> '.$row['timestamp'].'</small></b>
                 
                </div>
                <hr class="w-100">
                <p class="mb-0">';
                if($row['deleted']==1)
                {
                	$output.='<div style="color:blue;">'.$row['deletedby'].'&nbsp deleted the message.</div>';
                }
                else{

                $output.=$row['message'];
                $output.=' <button class="badge badge-danger float-right" id="delete"data-mid="'.$row['mid'].'">Delete</button>';
             }
             	$output.='
                </p>
              </div>	
            </li>
	        	';
	        }
	    }
	    $query="UPDATE message SET status='1' WHERE fromuid='".$uid."' AND touid='".$ownuid."' AND status='0'";
	    $result=mysqli_query($db,$query);
		echo $output;
	}
}

if(isset($_POST['deletemessage']))
{
	$mid=$_POST['messageid'];
	$name=$_SESSION['name'];
	$query="UPDATE message SET deleted='1',deletedby='$name' where mid='$mid'";
	$result=mysqli_query($db,$query);
	if($result)
	{
		echo 1;
	}
}

if(isset($_POST['insertmessage']))
{
	$message=mysqli_real_escape_string($db,$_POST['message']);
	$sendid=$_POST['touid'];
	$fromuid=$_SESSION['user'];
	$query="INSERT INTO message (fromuid,touid,message,timestamp,status) VALUES('$fromuid','$sendid','$message',now(),0)";
	$result=mysqli_query($db,$query);
	if($result)
	{
		echo 1;
	}
} 

function count_unseen_message($fromuid,$touid)
{
	$db=mysqli_connect('localhost','root','','chat');
	$output="";
	$query="SELECT * FROM message where fromuid='$fromuid' AND touid='$touid' AND status='0'";
	 $result=mysqli_query($db,$query);
	 $count=mysqli_num_rows($result);
	 if($count>0)
	 {
	 	$output='<span  class="badge badge-warning float-right" style="margin-top:10px;">'.$count.'</span>';
	 }
	return $output;
	 
}

function lastshowmessage($fromuid,$touid)
{
	$output="";
	$db=mysqli_connect('localhost','root','','chat');
	$query="SELECT * FROM message where (fromuid='$fromuid'AND touid='$touid')OR(fromuid='$touid'AND touid='$fromuid') ORDER BY mid DESC LIMIT 1";
	$result=mysqli_query($db,$query);
	$row=$result->fetch_assoc();
	if(mysqli_num_rows($result)==1)
	{
		if($row['fromuid']==$fromuid && $row['touid']==$touid)
		{
		$output='<p class="last-message text-muted" style="margin-top:10px;"><b>'.substr($row['message'],0,30)."....".'</b><i class="fas fa-angle-double-left text-warning"></i></p>';
		}
		else
		{
			$output='<p class="last-message text-muted" style="margin-top:10px;"><b>'.substr($row['message'],0,30)."....".'</b> <i class="fas fa-angle-double-right text-warning "></i></p> ';
		}
	}
	else
	{
		$output='<p class="last-message text-muted" style="margin-top:10px;"><b>No messages yet.Click to chat. </b></p>';
	}
	return $output;
}

if(isset($_POST['typing']))
{
	$is_type=$_POST['is_type'];
	$loginid=$_SESSION['login'];
	$query="UPDATE logindetail SET is_type='$is_type' WHERE detailid='$loginid'";
	$result=mysqli_query($db,$query);	
}

function fetch_is_type_status($userid)
{
	$output="";
	$db=mysqli_connect('localhost','root','','chat');
	$query="SELECT is_type FROM logindetail WHERE uid='$userid' ORDER BY timestamp DESC LIMIT 1 ";
	$result=mysqli_query($db,$query);
	$row=$result->fetch_assoc();
	if($row['is_type']=='yes')
	{
		$output=' - <small><em><span class="text-muted">Typing...</span></em></small>';
	}
	return $output;
}

if(isset($_POST['groupmessage']))
{
		$chat=$_POST['chat_message'];
		$fromuid=$_SESSION['user'];
		$query="INSERT INTO message(fromuid,message,timestamp,status) VALUES('$fromuid','$chat',now(),'0')";
		$result=mysqli_query($db,$query);
		if($result)
		{
			echo fetch_group_chat_history();
		}
	
}
 function fetch_group_chat_history()
 {
 	$output="";
 	$db=mysqli_connect('localhost','root','','chat');
 	$query="SELECT * FROM message WHERE touid='0' ORDER BY timestamp ASC ";
 	$result=mysqli_query($db,$query);
 	$output='<div class="chat-message">

          <ul class="list-unstyled chat-1 scrollbar-light-blue">';
 	if(mysqli_num_rows($result)>0)
 	{
 		while($row=$result->fetch_assoc())
 		{
 			
 			if($row['fromuid']==$_SESSION['user'])
 			{
 				  $output.='

            <li class="d-flex justify-content-between mb-4">
              <div class="chat-body white p-3 z-depth-1" style="width:700px;">
                <div class="header">
                  <strong class="primary-font">'.$_SESSION['name'].'</strong>&nbsp &nbsp
                  <small style="color:red;"><i class="far fa-clock"></i> '.$row['timestamp'].'</small>
                </div>
                <hr class="w-100">
                <p class="mb-0">';
                  if($row['deleted']==1)
              {
                	$output.='<div style="color:blue;">'.$row['deletedby'].'&nbsp deleted the message.</div>';
                }
                else{
                  $output.=$row['message']; 
                  $output.='<button class="badge badge-danger float-right" id="delete" data-mid="'.$row['mid'].'">Delete</button>&nbsp &nbsp
                                    <button class="badge badge-success float-right" id="edit">Edit</button>';


              		}

                $output.='</p>
              </div>
              <img src="image/'.$_SESSION['photo'].'" alt="avatar" class="avatar rounded-circle mr-0 ml-3 z-depth-1" height=100px; width=100px;>
            </li>';
 			}
 			else
 			{
 				$output.='<li class="d-flex justify-content-between mb-4">
              <img src="image/'.get_user_photo($row['fromuid']).'" alt="avatar" class="avatar rounded-circle mr-2 ml-lg-3 ml-0 z-depth-1" width=100px; height=100px;>
              <div class="chat-body white p-3 ml-2 z-depth-1" style=" width:600px;margin-right:10%;">
                <div class="header">
                  <strong class="primary-font">'.get_user_name($row['fromuid']).'</strong>&nbsp &nbsp
                  <small  style"color:red;"><i class="far fa-clock"></i> '.$row['timestamp'].'</small>
                </div>
                <hr class="w-100">
                <p class="mb-0">';
                   if($row['deleted']==1)
              {
                	$output.='<div style="color:blue;">'.$row['deletedby'].'&nbsp deleted the message.</div>';
                }
                else{
                  $output.=$row['message'];
                  $output.='<button class="badge badge-danger float-right" id="delete" data-mid="'.$row['mid'].'">Delete</button>&nbsp &nbsp';
              		}
                  
                $output.='</p>
              </div>
            </li>';
 			}
 		}
	}
	$output.='</ul></div>';
	return $output;
 }
 function get_user_name($uid)
 {
 	$db=mysqli_connect('localhost','root','','chat');
 	$query="SELECT * FROM chat WHERE uid='$uid' ";
 	$result=mysqli_query($db,$query);
 	$row=$result->fetch_assoc();
 	if($result)
 	{
 		$output=$row['fname'].' '.$row['lname'];
 	}
 	return $output;
 }
 function get_user_photo($uid)
 {
 	$db=mysqli_connect('localhost','root','','chat');
 	$query="SELECT * FROM chat WHERE uid='$uid' ";
 	$result=mysqli_query($db,$query);
 	$row=$result->fetch_assoc();
 	if($result)
 	{
 		$output=$row['picture'];
 	}
 	return $output;
 }

 if(isset($_POST['groupchathistory']))
 {
 	echo fetch_group_chat_history();
 }
?>