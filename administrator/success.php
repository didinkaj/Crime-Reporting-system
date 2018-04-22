
<?php 
	
    include 'includes/overallheader.php';
	
	if(!isset($_SESSION['email'])){
		header('Location:../logout.php');
	}
	
?>
  <div class="container">
    <div id="header">
        <div class="div1">
            <img src="images/lock-open.png" style="position: relative; top: 3px;"> &nbsp; You are logged in as: <b><?php echo $_SESSION['email'];?></b>
        </div>
        <div class="div2">
           <div class="logo"><img src="images/lg.jpg" width="60px" height="50px"/>Speak Up <span>Desk</span></div>
        </div>
    </div>
    <?php include 'includes/menu.php'; ?>
    <div class="clear"></div>
   
    <div class="main">
        <div class="heading">
            <h1><img src="images/home.png" style="position: relative; " />&nbsp; Success</h1>
            <div class="clear"></div>
        </div>
        <div class="content">
          <div class="row">
           <div class="col-md-12">
                   <div class="dashboard-content">
                     <div class="dashboard-heading">Info</div>
                     	<p style="margin-top:20px;background-color:#ccf6ae; border:2px solid #b1f580; padding:10px 15px;border-radius:5px;">Success! An email has been sent to the applicant. <a href="index.php">Back to home</a></p>
                    </div>
           </div>
           
          </div>
          
        </div>
       <div id="footer">
           <p class="center"><b>Speak up. 2009-2014. Dashboard.</b></p>
       </div> 
    </div>
   </div>
    </body>
</html>
