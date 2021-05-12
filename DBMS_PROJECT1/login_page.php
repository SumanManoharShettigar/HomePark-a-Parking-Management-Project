<?php
	include('connect.php');
	session_start();
?>

<?php
	$mysql=new mysqli("localhost","root","","test");
	if(!$mysql)
	{
    	die("Connection Error..!");
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title> Login </title>
    <link rel="stylesheet" href="css/looks.css?<?php echo time(); ?>">
</head>
<body background="img/3.jpg">
    

	<form id="form1" method="post">
        <div id="logint">LOGIN</div>
        
        <div class="login_text">
        <p id="username">Enter The Username</p>
            </div>
        <div >   
		<input class="login_input" type="text" name="usname" id="usname" required placeholder="Username">
            </div> 
        
        <div class="login_text" >
        <p id="password">Enter The Password</p>
        
        </div>
        
        <div >
		<input class="login_input" type="password" name="pwd" id="pwd" placeholder="Password"
               required>
    </div><br>
    <div>
		<input class="login_chk" type="checkbox" name="chkbox" value="Admin"><span class="login_text"> ADMIN</span> 
    </div><br>
        <div >
		<input id="login_btn" type="submit" name="submit" value="Log In">
    </div>
	</form>
    
    <a id="contact2" href="Developer.html">Contact Developers</a>
     <a id="contact1" href="Contact.html">Email Us </a>
    
    
    
    <span id="wel">Welcome To<br></span><span id="homepark">HomePark</span>
     
    
</body>
</html>

<?php
	if(isset($_POST['submit']))
	{
		if(isset($_POST['chkbox']))
		{ 
                	$log_name=$_POST["usname"];
			$log_password=($_POST["pwd"]);
			if($log_name=="admin" && $log_password=="admin")
			{
                        	$_SESSION['log_name']=$log_name;
				header("location:admin_home.html");
			}
			else
			{
				echo"<script>alert('PLEASE CHECK YOUR USER ID AND PASSWORD THEN TRY AGAIN')</script>";
				$log_name=NULL;
				$log_password=NULL;
			}
		}		
		else
		{
            $log_name=$_POST["usname"];
            
			$log_password=($_POST["pwd"]);
            
	
			if($log_name!=NULL or $log_name!="" and $log_password!=NULL or $log_password!="")
			{ 
				$q=$conn->prepare("SELECT * FROM login_details WHERE owner_id =".$log_name." AND  owner_password='".$log_password."'");
				$q->execute();
				$res=$q->FetchAll(PDO::FETCH_OBJ);
				if($res)
				{
	 		$_SESSION['log_name']=$log_name;
					header("location:user_home.php");
			        }
				else
				{
					echo"<script>alert('PLEASE CHECK YOUR USER ID AND PASSWORD THEN TRY AGAIN')</script>";
					$log_name=NULL;
					$log_password=NULL;
				}
			}
                }
	}
?>