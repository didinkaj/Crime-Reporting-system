<?php $current_page= basename($_SERVER['SCRIPT_NAME']);?>
<div id="menu">
    <ul class="left">
       <li <?php if($current_page == 'index.php') echo 'class="selected"' ?> ><a href="index.php">Dashboard</a></li>
    </ul>
    <ul class="right">
       <li><a href="../index.php" target="blank">Site</a></li>
       <li><a href="../logout.php">Logout</a></li>
    </ul>
</div>
