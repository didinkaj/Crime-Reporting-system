
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
            <h1><img src="images/home.png" style="position: relative; " />&nbsp; Application</h1>
            <div class="clear"></div>
        </div>
        <div class="content">
          <div class="row">
           <div class="col-md-12">
                   <div class="dashboard-content">
              
                     <div class="dashboard-heading">Details</div>
                     
                     <table width="50%">
                     <?php 
                      
                      	if(isset($_GET['n'])){
                      		$name = urldecode($_GET['n'])
                     ?>
                     <form method="post" action="application_handler.php">
                     	<input type="hidden" name="person" value="<?php echo $name; ?>">
                	 <?php
                	 
                	 	if(!isset($_GET['status'])){
                      		$db_conn -> getDetailedInfoPerson($name);
						}
						else{
							$db_conn -> getDetailedInfoPersonFound($name);
						}
					?>
						<tr>
                      	<td colspan="2">
                      		<?php 
                      			if(!isset($_GET['status'])){
                      		?>
                      		<input style="border:none; margin-top: 10px; margin-right:20px;" type="submit" class="btn-success btn-sm pull-right" name="alertPerson" value="Post Alert" />
                      		<?php
								}
								else{
                      		?>
                      			<input style="border:none; margin-top: 10px; margin-right:20px;" type="submit" class="btn-success btn-sm pull-right" name="personFound" value="Withdraw Alert" />
                      		<?php
								}
                      		?>
                      	
                      	</td>
                      </tr>
                     </form>
					<?php
						}
						else{
							echo "No details to display";
						}
						
                      ?>
                      
                     </table>
               
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
