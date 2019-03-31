
<?php include 'include/header.php'; ?>
<?php include 'include/slider.php'; ?>




 <div class="main">
    <div class="content">
    	<div class="content_top">
    		<div class="heading">
    		<h3>Feature Products</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
	      <div class="section group">
	      
<?php			
$query = "SELECT * FROM products WHERE product_type = 'Featured' ORDER BY product_id DESC LIMIT 4 ";
$select_products = mysqli_query($connection,$query);
if($select_products){
    while($row = mysqli_fetch_assoc($select_products)){
        
    $product_id = $row['product_id'];
    $product_title = $row['product_title'];
    $product_cat = $row['product_cat'];
    $product_details = substr($row['product_details'],0,100);
    
    $product_image = $row['product_img'];
      
    $product_prize = $row['product_prize'];
    $product_type = $row['product_type'];
    $product_brand = $row['product_brand'];
			
?>
	      
	      
	      
	      
	      
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="details.php?p_id=<?php echo $product_id; ?>"><img height="218" width="282" src="admin/img/products_img/<?php echo $product_image; ?>" alt="" /></a>
					 <h2><?php echo $product_title; ?> </h2>
					 <p><?php echo $product_details; ?></p>
					 <p><span class="price"><?php echo $product_prize; ?></span></p>
				     <div class="button"><span><a href="details.php?p_id=<?php echo $product_id; ?>" class="details">Details</a></span></div>
				</div>
<?php }

}else{
    echo "No Product Found";
}
?>
			</div>
			<div class="content_bottom">
    		<div class="heading">
    		<h3>New Products</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
			<div class="section group">
			
			
			
			
<?php			
$query = "SELECT * FROM products LIMIT 4 ";
$select_products = mysqli_query($connection,$query);
if($select_products){
    while($row = mysqli_fetch_assoc($select_products)){
        
    $product_id = $row['product_id'];
    $product_title = $row['product_title'];
    $product_cat = $row['product_cat'];
    $product_details = substr($row['product_details'],0,100);
    
    $product_image = $row['product_img'];
      
    $product_prize = $row['product_prize'];
    $product_type = $row['product_type'];
    $product_brand = $row['product_brand'];
			
?>
			
			
			
			
			
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="details.php?p_id=<?php echo $product_id; ?>"><img height="218" width="282" src="admin/img/products_img/<?php echo $product_image; ?>" alt="" /></a>
					 <h2><?php echo $product_title; ?></h2>
					 <p><?php echo $product_details; ?></p>
					 <p><span class="price"><?php echo $product_prize; ?></span></p>
				     <div class="button"><span><a href="details.php?p_id=<?php echo $product_id; ?>" class="details">Details</a></span></div>
				</div>
				
<?php }

}else{
    echo "No Product Found";
}
?>				

			</div>
    </div>
 </div>
 
 
 <?php include 'include/footer.php'; ?>

 
