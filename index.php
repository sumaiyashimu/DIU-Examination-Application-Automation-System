<?php include("header.php");?>
<main>
    <div class="welcome ex-font">
        <img src="img/logo.png" alt="" height="120" width="120">
        <h1>Welcome To</h1>
        <h2>DIU Overlap System</h2>
    </div>
    <div style="text-align: center; margin-bottom: 28px;">
        <a href="routine.php" target="_blank" class="btn waves-effect waves-light deep-orange">View Routine
            <i class="material-icons right">send</i>
        </a>
        
    </div>
    <?php include("login.php") ?>
    <?php include("signup.php") ?>
    
</main>


<?php include("footer.php");?>


<script>
$(document).ready(function() {
    $('.tabs').tabs();
});
$(document).ready(function() {
    $('.sidenav').sidenav();
});
</script>