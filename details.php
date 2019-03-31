<?php include 'include/header.php'; ?>




<?php
if($_GET['p_id']){
    $the_product_id = $_GET['p_id'];
}
$query = "SELECT * FROM products WHERE product_id = {$the_product_id} ";
$select_products = mysqli_query($connection,$query);
if($select_products){
    while($row = mysqli_fetch_assoc($select_products)){
        
    $product_id = $row['product_id'];
    $product_title = $row['product_title'];
    $product_cat = $row['product_cat'];
    $product_details = substr($row['product_details'],0,200);
    
    $product_image = $row['product_img'];
      
    $product_prize = $row['product_prize'];
    $product_type = $row['product_type'];
    $product_brand = $row['product_brand'];
			
?>

 <div class="main">
    <div class="content">
    	<div class="section group">
				<div class="cont-desc span_1_of_2">				
					<div class="grid images_3_of_2">
						<img height="218" width="282" src="admin/img/products_img/<?php echo $product_image; ?>" alt="" />
					</div>
				<div class="desc span_3_of_2">
					<h2><?php echo $product_title; ?> </h2>
					<p><?php echo $product_details; ?></p>					
					<div class="price">
						<p>Price: <span><?php echo $product_prize; ?></span></p>
						<p>Category: <span><?php echo $product_cat; ?></span></p>
						<p>Brand:<span><?php echo $product_brand; ?></span></p>
					</div>
				<div class="add-cart">
					<form action="" method="post">

<?php

if(isset($_POST['submit'])){
    if(isset($_SESSION['customer_username'])){

    $product_quantity = $_POST['product_quantity'];
    
    $query = "INSERT INTO cart (cart_product_id, cart_customer_id, cart_product_quantity ) ";
    $query .= "VALUES ('{$product_id}', '{$_SESSION['customer_id']}', '{$product_quantity}' )";
    
        $create_cart_query = mysqli_query($connection,$query);
    
        if(!$create_cart_query){
            
            die('QUERY FAILED') . mysqli_error();
            
        }else{
                header("Location: cart.php");
        }
    }else{
        header("Location: login.php");
    }
}
                
?>        
            
						<input type="number" class="buyfield" name="product_quantity" value="1"/>
						<input type="submit" class="buysubmit" name="submit" value="Buy Now"/>
                    </form>				
				</div>
			</div>
			<div class="product-desc">
			<h2>Product Details</h2>
			<p><?php echo $product_details; ?></p>
                </div>
<?php }

}else{
    echo " ";
}
?>
            </div>
				<div class="rightsidebar span_3_of_1">
					<h2>CATEGORIES</h2>	
					
<?php
                        
    $query = "SELECT * FROM catagories ";
    $select_catagory = mysqli_query($connection,$query);

    while($row = mysqli_fetch_assoc($select_catagory)){
    $cat_id = $row['cat_id'];
    $cat_title = $row['cat_title'];
    
?>
					<ul>
				      <li><a href="productbycat.php"><?php echo $cat_title; ?></a></li>
    				</ul>
<?php } ?>
 				</div>
 		</div>
 	</div>

<?php include 'include/footer.php'; ?>

