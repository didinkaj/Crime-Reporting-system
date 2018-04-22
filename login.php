<?php 
	include 'php/includes/header.php'; 


?>


<?php
		//require 'php/init.php';
	
	$title = basename($_SERVER['SCRIPT_NAME']);
	$title = str_ireplace('.php', '', $title);
	
	ucfirst($title);
	
	if($title == 'index')
		$title = 'Home';
?>
<html>
	<head>
	
		<title><?php echo $title; ?></title>
		
		<meta name="viewport" content="width=device-width; initial-scale=1.0">
		<link href="libraries/bootstrap/css/font-awesome.css" rel="stylesheet" media="screen">
     	<link href="libraries/bootstrap/css/my_style.css" rel="stylesheet" media="screen">
	 	<link href="libraries/bootstrap/css/print.css" rel="stylesheet" media="print">
	 	<link type="text/css" href="css/bootstrap.css" rel="stylesheet"/>
	 	<link type="text/css" href="css/bootswatch.css" rel="stylesheet"/>
	 	<!-- <link href="css/screen.css" rel="stylesheet" media="screen"> -->

		
		<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
		<script type="text/javascript" src="libraries/bootstrap/js/bootstrap.js"></script>
		<script type="text/javascript" src="js/validator.js"></script>
		
		<script type="text/javascript">
		$(function(){
		// highlight
			var elements = $("input[type!='submit'], textarea, select");
			elements.focus(function(){
				$(this).parents('li').addClass('highlight');
			});
			elements.blur(function() {
				$(this).parents('li').removeClass('highlight');
			});

			$("#forgotpassword").click(function(){
				$("#password").removeClass("required");
				$("#login").submit();
				$("#password").addClass("required");
				return false;
			});

			$("#login").validate();
			
			$('#login').submit(function(e){
				e.preventDefault();
				
				
				var isValid = $('#login').valid();
				
				if(isValid){
					var data = $('#login').serialize();
					
					$.post('php/dataHandler.php',data,function(data2){
						
						var feedBack = JSON.parse(data2);
						
						var success = String(feedBack.success);
						
						if(success == 'pass'){
							$('#login').each(function(){
    						this.reset();
							});
							
							var email = String(feedBack.email);
							
							if( email== 'admin@admin.com'){
						  	location.replace('redirect.php');
						 }
						 else{
						 	location.replace('index.php');
						 }
						}
						else if(success == 'fail'){
							$('#error_message').html('<div style="background-color:#FFE0FF; padding:5px 10px;border-radius:5px;font-family:Verdana; border:2px solid #FFC2FF;">Wrong email and password combination.Try again</div>');
							$('#password').val("");
						}
						
					});
					
					
				}
				
				return false;
			});
		});
		</script>
		<style type="text/css">
		
    		#heading {
        		margin-top: 20px;
				height: 38px;
				padding-left: 7px;
				padding-right: 7px;
       		    margin-left:20px;
                margin-right:20px;
	            border: 1px solid #DBDBDB;
	            background: url(images/box.png) repeat-x;
				-webkit-border-radius: 7px 7px 0px 0px;
				-moz-border-radius: 7px 7px 0px 0px;
				-khtml-border-radius: 7px 7px 0px 0px;
				border-radius: 7px 7px 0px 0px;
        		width:450px;
			}
			
			#heading h3{
				margin: 0px;
				padding: 10px 10px 0px 0px;
				color: #003A88;
				font-size: 17px;
				float: left;
			}
			.content{
   				 border-left: 1px solid #CCCCCC;
    			 border-right: 1px solid #CCCCCC;
    			 border-bottom: 1px solid #CCCCCC;
    			 width:450px;
    			 padding-left: 7px;
    			 padding-right: 7px;
   				 margin-left:20px;
   				 margin-right:20px;
   				 margin-top: -5px;
   				 padding-top:30px;
   				 margin-bottom: 30px;
   				 height:200px;    
			}
		.content form{
   				 float:left;  
			}
		.content img{
  				  margin-left:20px;
   				  margin-top:30px;
   				  margin-right:20px;
   				  float: left;
			}
		
		.content form #submit{
   				 background-color:#287df1;
   				 color:#fff;
   				 padding:3px 5px;
   				 border-radius: 4px;
   				 border:none;
    			 margin-left:150px;
		}
		.content form #submit:hover{
    			background-color:#0a50ae;
    			color:#fff;
    			padding:3px 5px;
    			border-radius: 4px;
    			border:none;
		}
	.login_main{
   				width:450px;
   				margin-left: auto ;
   				margin-right: auto ;
  				 margin-top:100px;
		}

	#login span.error{
          		font-size: 15px;
          		font-family:Verdana, Geneva, Arial, Helvetica, sans-serif;
          		background-image:url(images/error2.png);
          		background-position:left 6px;
          		padding-left: 15px;
          		display:block;
          		margin-left:3px;
         	    background-repeat:no-repeat;
          		padding-top:5px;
          		color:red;
      }
      error{
      	display:block;
      }
      #footer {   
			width: 100%;
			height: 28px;
			position: absolute;
			bottom: 0px; 
			left: 0px; 
			text-align: center; 
			font-family: Verdana, Geneva, sans-serif;
		}
		
	 ul{
	 	list-style:none;
	 }
	form li
		{
		width: 100%;
		padding:5px 0px 8px 0;
		display:block;
		float: left;
		
	}
form ul
		{
		padding:5px 10px;
		list-style: none;
		}

	form label
		{
		padding:0px 10px;
		width: 160px;
		float: left;
		}
		
	form .error{
		color: #c00;
		}
		
	form label.error
		{
		color: #c00;
		font-size: 12px;
		width:308px;
		font-weight: normal;
		font-variant:small-caps;
		display: none;
		margin:0px 0px 0px 150px;
		padding:3px 0px 0px 5px;
		clear:both;
		}
		
	form label.info{
		font-size: 100%;
		font-weight: bold;
		font-family:Arial, Helvetica, sans-serif;
		margin:8px 0px 0px 180px;
		padding:3px 0px 0px 5px;
		}
    	</style>
    </head>
<body>
	<div class="container" id="wrapper">
		<div id="header">
			 <div class="logo" style="margin-top:-40px;margin-bottom:8px;"><img src="images/lg.jpg" width="60px" height="50px"/>Speak Up <span>Desk</span></div>
		</div>
		<div style="clear:both;"></div>
		<div id="nav">
			<?php include 'php/includes/navigation.php'?>
		</div>	
<div id="main">
<div class="row" >
	 <div class="col-sm-3"></div>
				<div class="col-sm-9">
        <div id="heading">
            <h3><img src="images/lockscreen.png" > &nbsp; <span style="margin-bottom:20px; position:relative;">Login</span></h3>
            <div class="clearer"></div>
        </div>
  
        <div class="content">
           
		<form action="" method="post" id="login">
			
				<ul>
					<li id="error_message">
					</li>
					<li>
						<label for="email">
							<span class="required" style="font-family: Verdana, Geneva, Arial, Helvetica, sans-serif;font-weight: normal;">Email address</span>
						</label>
						<br>
						<input id="email" name="email" class="text required email" type="text"><br>
						<label for="email" class="error" style="display:none;">This must be a valid email address</label>
					</li>
					
					<li>
						<label for="password">
							<span class="required" style="font-family: Verdana, Geneva, Arial, Helvetica, sans-serif;font-weight: normal;">Password</span>
						</label>
						<br>
						<input name="password" type="password" class="text required" id="password" minlength="4" maxlength="20"><br>
					</li>
					<br>
					<li>
						<label class="centered info"><a id="forgotpassword" href="#" style="font-family: trebuchet ms;font-size: 13px;font-weight:normal;">Email my password...</a>
						</label>
					</li>
				</ul>
			
				<input  type="submit" class="button" value="Login" style="margin-left:280px; font-family:trebuchet ms;font-size: 15px;font-weight:bold;">
			
		</form>
		
	</div>
			
</div>
		
		
		</div>
		<div style="" id="lfooter"> 
		<p style="margin-top:5px;">Copyright &copy; Speak up <a href="#" title="email">By Fabian Ocham </a>  </p>
		<div style="float:right; margin-top:-35px;margin-right:5px;">
			<a href="#"><img src="images/facebook_32.png" alt="" /></a>&nbsp;<a href="#"><img src="images/twitter_32.png" alt="" /></a>
		</div>
		</div>
			
	</div>
	
	
	
	
	