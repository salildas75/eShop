	<div class="header_bottom">
		<div class="header_bottom_left">
			<div class="section group">
			
			
<?php
                
$query = "SELECT * FROM products WHERE product_brand = 'Iphon' LIMIT 1 ";
$select_products = mysqli_query($connection,$query);
if($select_products){
    while($row = mysqli_fetch_assoc($select_products)){
        
    $product_id = $row['product_id'];
    $product_title = $row['product_title'];
    $product_cat = $row['product_cat'];
    $product_details = substr($row['product_details'],0,20);
    
    $product_image = $row['product_img'];
      
    $product_prize = $row['product_prize'];
    $product_type = $row['product_type'];
    $product_brand = $row['product_brand'];
			
?>

			
			
			
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						 <a href="details.php?p_id=<?php echo $product_id ?>"> <img height="136" width="111" src="admin/img/products_img/<?php echo $product_image; ?>" alt="" /></a>
					</div>
				    <div class="text list_2_of_1">
						<h2><?php echo $product_brand; ?></h2>
						<p><?php echo $product_details; ?></p>
						<div class="button"><span><a href="details.php?p_id=<?php echo $product_id ?>">Add to cart</a></span></div>
				   </div>
			   </div>	
			   
			   		
<?php }

}else{
    echo " ";
}
?>			   				
	
			   								   						
		
<?php //2nd
                
$query = "SELECT * FROM products WHERE product_brand = 'Walton' LIMIT 1 ";
$select_products = mysqli_query($connection,$query);
if($select_products){
    while($row = mysqli_fetch_assoc($select_products)){
        
    $product_id = $row['product_id'];
    $product_title = $row['product_title'];
    $product_cat = $row['product_cat'];
    $product_details = substr($row['product_details'],0,20);
    
    $product_image = $row['product_img'];
      
    $product_prize = $row['product_prize'];
    $product_type = $row['product_type'];
    $product_brand = $row['product_brand'];
			
?>

			
			
			
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						 <a href="details.php?p_id=<?php echo $product_id ?>"> <img height="136" width="111" src="admin/img/products_img/<?php echo $product_image; ?>" alt="" /></a>
					</div>
				    <div class="text list_2_of_1">
						<h2><?php echo $product_brand; ?></h2>
						<p><?php echo $product_details; ?></p>
						<div class="button"><span><a href="details.php?p_id=<?php echo $product_id ?>">Add to cart</a></span></div>
				   </div>
			   </div>	
			   
			   		
<?php }

}else{
    echo " ";
}
?>
        
        
        
			</div>
			<div class="section group">
			
			
			
			
<?php //3rd
                
$query = "SELECT * FROM products WHERE product_brand = 'Oppo' LIMIT 1 ";
$select_products = mysqli_query($connection,$query);
if($select_products){
    while($row = mysqli_fetch_assoc($select_products)){
        
    $product_id = $row['product_id'];
    $product_title = $row['product_title'];
    $product_cat = $row['product_cat'];
    $product_details = substr($row['product_details'],0,20);
    
    $product_image = $row['product_img'];
      
    $product_prize = $row['product_prize'];
    $product_type = $row['product_type'];
    $product_brand = $row['product_brand'];
			
?>

			
			
			
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						 <a href="details.php?p_id=<?php echo $product_id ?>"> <img height="136" width="111" src="admin/img/products_img/<?php echo $product_image; ?>" alt="" /></a>
					</div>
				    <div class="text list_2_of_1">
						<h2><?php echo $product_brand; ?></h2>
						<p><?php echo $product_details; ?></p>
						<div class="button"><span><a href="details.php?p_id=<?php echo $product_id ?>">Add to cart</a></span></div>
				   </div>
			   </div>	
			   
			   		
<?php }

}else{
    echo " ";
}
?>			

                
                
<?php //3rd
                
$query = "SELECT * FROM products WHERE product_brand = 'Canon' LIMIT 1 ";
$select_products = mysqli_query($connection,$query);
if($select_products){
    while($row = mysqli_fetch_assoc($select_products)){
        
    $product_id = $row['product_id'];
    $product_title = $row['product_title'];
    $product_cat = $row['product_cat'];
    $product_details = substr($row['product_details'],0,20);
    
    $product_image = $row['product_img'];
      
    $product_prize = $row['product_prize'];
    $product_type = $row['product_type'];
    $product_brand = $row['product_brand'];
			
?>

			
			
			
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						 <a href="details.php?p_id=<?php echo $product_id ?>"> <img height="136" width="111" src="admin/img/products_img/<?php echo $product_image; ?>" alt="" /></a>
					</div>
				    <div class="text list_2_of_1">
						<h2><?php echo $product_brand; ?></h2>
						<p><?php echo $product_details; ?></p>
						<div class="button"><span><a href="details.php?p_id=<?php echo $product_id ?>">Add to cart</a></span></div>
				   </div>
			   </div>	
			   
			   		
<?php }

}else{
    echo " ";
}
?>                

			</div>
		  <div class="clear"></div>
		</div>
			 <div class="header_bottom_right_images">
		   <!-- FlexSlider -->
             
			<section class="slider">
				  <div class="flexslider">
					<ul class="slides">
					
                
<?php
                        
    $query = "SELECT * FROM slider ";
    $select_slider = mysqli_query($connection,$query);

    while($row = mysqli_fetch_assoc($select_slider)){
    $slider_id = $row['slider_id'];
    $slider_title = $row['slider_title'];
    $slider_img = $row['slider_img'];

    echo "<li>";
    echo "<img width = '573' height = '321' src='images/$slider_img' alt = 'imagee'/>";
    echo "</li>";
    
    }
?>

                
				    </ul>
				  </div>
	      </section>
<!-- FlexSlider -->
	    </div>
	  <div class="clear"></div>
  </div>	