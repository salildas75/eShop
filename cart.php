<?php include 'include/header.php'; ?>

 <div class="main">
    <div class="content">
    	<div class="cartoption">		
			<div class="cartpage">
			    	<h2>Your Cart</h2>
						<table class="tblone">
							<tr>
								<th width="20%">Product Name</th>
								<th width="10%">Image</th>
								<th width="15%">Price</th>
								<th width="25%">Quantity</th>
								<th width="20%">Total Price</th>
								<th width="10%">Action</th>
							</tr>
							
							
<?php 

    //UPDATE QUERY
        
    if(isset($_GET['update'])) {
        
    $the_cart_id = $_GET['update'];
    
    $the_cart_product_quantity = $_POST['cart_product_quantity'];
        
    if($the_cart_product_quantity>0){
        $query = "UPDATE cart SET cart_product_quantity = '{$the_cart_product_quantity}' WHERE cart_id = {$the_cart_id}";
        $update_query = mysqli_query($connection,$query);


            if(!$update_query){
                die("Query Faied" . mysqli_error($connection));
            }

            header("Location: cart.php");
        }else{
            echo "This is not fair";
        }
    }
                            
                            
                            
    //DELETE QUERY
                            
    if(isset($_GET['delete'])) {
        
    $the_cart_did = $_GET['delete'];
        
    $query = "DELETE FROM cart WHERE cart_id = {$the_cart_did}";
    $delete_query = mysqli_query($connection,$query);


    
        if(!$delete_query){
            die("Query Faied" . mysqli_error($connection));
        }
        
        header("Location: cart.php");
    }                       
                            

    
    $query = "SELECT product_id, product_title, product_img, product_prize, cart.cart_id, cart.cart_customer_id, cart.cart_product_quantity FROM products 
                JOIN cart ON products.product_id = cart_product_id AND cart.cart_customer_id = '{$_SESSION['customer_id']}' ";
    $select_products = mysqli_query($connection,$query);

            $total_price = 0;
                        
    while($row = mysqli_fetch_assoc($select_products)){
        
    $product_title = $row['product_title'];
    $cart_id = $row['cart_id'];
    $product_image = $row['product_img'];
    $product_prize = $row['product_prize'];
    
    $cart_product_quantity = $row['cart_product_quantity'];
        
    $product_price_by_quantity = $cart_product_quantity * $product_prize;  
    

?>

							
							
							<tr>
								<td><?php echo $product_title; ?></td>
								<td><img src="admin/img/products_img/<?php echo $product_image; ?>" alt=""/></td>
								<td>Tk. <?php echo $product_prize; ?></td>
								<td>
									<form action="cart.php?update=<?php echo $cart_id; ?>" method="post">
										<input type="number" name="cart_product_quantity" value="<?php echo $cart_product_quantity; ?>"/>
										<input type="submit" name="submit" value="Update"/>
									</form>
								</td>
								<td>Tk. <?php echo $product_price_by_quantity; ?></td>
								<td><a href="cart.php?delete=<?php echo $cart_id; ?>">X</a></td>
							</tr>
							
<?php
        $total_price = $total_price + $product_price_by_quantity;
    
    }
        $vat = ($total_price * 15)/100 ;
                            
        $grand_total = $total_price + $vat ;
                                    
                                    
                                    
?>
							
						</table>
						<table style="float:right;text-align:left;" width="40%">
							<tr>
								<th>Sub Total : </th>
								<td>TK. <?php echo $total_price; ?></td>
							</tr>
							<tr>
								<th>VAT : </th>
								<td>TK. <?php echo $vat; ?></td>
							</tr>
							<tr>
								<th>Grand Total :</th>
								<td>TK. <?php echo $grand_total; ?> </td>
								<?php $_SESSION['grand_total'] = $grand_total; ?>
							</tr>
					   </table>
					</div>
					<div class="shopping">
						<div class="shopleft">
							<a href="products.php"> <img src="images/shop.png" alt="" /></a>
						</div>
						<div class="shopright">
							<a href="checkout.php"> <img src="images/check.png" alt="" /></a>
						</div>
					</div>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>

<?php include 'include/footer.php'; ?>
