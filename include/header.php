<!DOCTYPE HTML>
<?php session_start(); ?>
<?php include 'include/db.php'; ?>
<head>
<title>Store Website</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<link href="css/menu.css" rel="stylesheet" type="text/css" media="all"/>
<script src="js/jquerymain.js"></script>
<script src="js/script.js" type="text/javascript"></script>
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script> 
<script type="text/javascript" src="js/nav.js"></script>
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script> 
<script type="text/javascript" src="js/nav-hover.js"></script>
<link href='http://fonts.googleapis.com/css?family=Monda' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Doppio+One' rel='stylesheet' type='text/css'>
<script type="text/javascript">
  $(document).ready(function($){
    $('#dc_mega-menu-orange').dcMegaMenu({rowItems:'4',speed:'fast',effect:'fade'});
  });
</script>
</head>
<body>
  <div class="wrap">
		<div class="header_top">
			<div class="logo">
				<a href="index.php"><img src="images/logo.png" alt="" /></a>
			</div>
			  <div class="header_top_right">
			    <div class="search_box">
				    <form>
				    	<input type="text" value="Search for Products" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search for Products';}"><input type="submit" value="SEARCH">
				    </form>
			    </div>
			    <div class="shopping_cart">
					<div class="cart">
						<a href="#" title="View my shopping cart" rel="nofollow">
								<span class="cart_title">Cart</span>
								<span class="no_product">(empty)</span>
							</a>
						</div>
			      </div>
                  
<?php
if(isset($_SESSION['customer_username'])){ ?>
        <div class="login"><a href="logout.php">Logout</a></div>
<?php
}else{
?>	
        <div class="login"><a href="login.php">Login</a></div>
<?php } ?>		 
                  
        <div class="clear"></div>
	 </div>
       
       
       
        <div>
            
<?php
    $query = "SELECT * FROM slogan ";
    $select_slogan = mysqli_query($connection,$query);
        
    while($row = mysqli_fetch_assoc($select_slogan)){
        $slogan_id = $row['slogan_id'];
        $slogan = $row['slogan'];
    }
                    
?>
            <marquee>
                <h5><?php echo $slogan; ?></h5>
            </marquee>
        </div>
        
        
        
	 <div class="clear"></div>
 </div>
<div class="menu">
	<ul id="dc_mega-menu-orange" class="dc_mm-orange">
	  <li><a href="index.php">Home</a></li>
	  <li><a href="products.php">Products</a> </li>
	  <li><a href="topbrands.php">Top Brands</a></li>
	  

<?php
if(isset($_SESSION['customer_username'])){ ?>
    <li><a href="cart.php">Cart</a></li>
    <li><a href="contact.php">Contact</a> </li>
    <li><a href="profile.php">Profile</a> </li>
<?php
}else{
    echo "";
}
?> 
	  <div class="clear"></div>
	</ul>
</div>
