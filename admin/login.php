<?php include '../include/db.php'?>
<?php session_start(); ?>
<?php
if(isset($_POST['submit'])){
    
    $admin_user = $_POST['admin_user'];
    $admin_pass = $_POST['admin_pass'];
    
    $admin_user = mysqli_real_escape_string($connection, $admin_user);
    $admin_pass = mysqli_real_escape_string($connection, $admin_pass);
    
    
    $query = "SELECT * FROM admin WHERE admin_user = '{$admin_user}' AND admin_pass = '$admin_pass' ";
    $select_admin_query = mysqli_query($connection,$query);
    
    
    
    
    while($row = mysqli_fetch_array($select_admin_query)){
        
        $db_admin_id   = $row['admin_id'];
        $db_admin_user = $row['admin_user'];
        $db_admin_pass = $row['admin_pass'];
        $db_admin_mail = $row['admin_mail'];
        
    }
    
    
    
    if($admin_pass == $db_admin_pass){
        
        $_SESSION['admin_user'] = $db_admin_user;
        $_SESSION['admin_id'] = $db_admin_id;

        header("Location: index.php");

    }else{

        header("Location: login.php");

    }
    
}

?>



<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Admin Login</title>
    <link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen" />
</head>
<body>
<div class="container">
	<section id="content">
		<form action="login.php" method="post">
			<h1>Admin Login</h1>
			<div>
				<input type="text" placeholder="Username" required="" name="admin_user"/>
			</div>
			<div>
				<input type="password" placeholder="Password" required="" name="admin_pass"/>
			</div>
			<div>
				<input type="submit" name="submit" value="Log in" />
			</div>
		</form><!-- form -->
		<div class="button">
			<a href="#">Forget?</a>
		</div><!-- button -->
	</section><!-- content -->
</div><!-- container -->
</body>
</html>