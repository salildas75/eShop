
<?php include 'inc/header.php';?>
<?php
if($_SESSION['admin_user']){ ?>
<?php include 'inc/sidebar.php';?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2> Dashbord</h2>
                <div class="block">               
                  Welcome admin <?php echo $_SESSION['admin_user']; ?>      
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>
<?php }else{
    header("Location: login.php");
}

?>