<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>



<?php //Add product query

if(isset($_POST['create_product'])){
    
    $product_title = $_POST['product_title'];
    $product_cat = $_POST['product_cat'];
    $product_details = $_POST['product_details'];
    
    $product_image = $_FILES['image']['name'];
    $product_image_temp = $_FILES['image']['tmp_name'];
      
    $product_prize = $_POST['product_prize'];
    $product_type = $_POST['product_type'];
    $product_brand = $_POST['product_brand'];
    
    
        move_uploaded_file($product_image_temp,"img/products_img/$product_image");
    
    if($product_title && $product_details && $product_image && $product_prize && $product_brand){
    
$query = "INSERT INTO products(product_title, product_details, product_prize, product_cat, product_brand, product_type, product_img)";
    
$query .= "VALUES('{$product_title}', '{$product_details}', '{$product_prize}', '{$product_cat}', '{$product_brand}', '{$product_type}', '{$product_image}') ";

$create_product_query = mysqli_query($connection, $query);
    
    if(!$create_product_query){
        die('Query Failed' . mysqli_error($connection));
    }
   
    
echo "<p class='bg-success'><h2>Product Created</h2></p>";
    
    }else{
    echo "<p class='bg-success'><h2>Feild should not be empty</h2></p>";
    }
}

?>




<div class="grid_10">
    <div class="box round first grid">
        <h2>Add New Product</h2>
        <div class="block">               
         <form action="" method="post" enctype="multipart/form-data">
            <table class="form">
               
                <tr>
                    <td>
                        <label>Name</label>
                    </td>
                    <td>
                        <input type="text" name="product_title" placeholder="Enter Product Name..." class="medium" />
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Category</label>
                    </td>
    
                    <td>
                        <select id="select" name="product_cat">
                           
                           
<?php
                        
    $query = "SELECT * FROM catagories ";
    $select_catagory = mysqli_query($connection,$query);

    while($row = mysqli_fetch_assoc($select_catagory)){
    $cat_id = $row['cat_id'];
    $cat_title = $row['cat_title'];
   
?>
        
    <option value="<?php echo $cat_title ?>"><?php echo $cat_title ?></option>
        
<?php
    
    }
?>	                           


                        </select>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Brand</label>
                    </td>
                    <td>
                        <input type="text" name="product_brand" placeholder="Enter Product Brand..." class="medium" />
                    </td>
                </tr>
				
				 <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Description</label>
                    </td>
                    <td>
                        <textarea class="tinymce" name="product_details"></textarea>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Price</label>
                    </td>
                    <td>
                        <input type="text" name="product_prize" placeholder="Enter Price..." class="medium" />
                    </td>
                </tr>
            
                <tr>
                    <td>
                        <label>Upload Image</label>
                    </td>
                    <td>
                        <input type="file" name="image"/>
                    </td>
                </tr>
				
				<tr>
                    <td>
                        <label>Product Type</label>
                    </td>
                    <td>
                        <select id="select" name="product_type">
                            <option>Select Type</option>
                            <option value="Featured">Featured</option>
                            <option value="Non-Featured">Non-Featured</option>
                        </select>
                    </td>
                </tr>

				<tr>
                    <td></td>
                    <td>
                        <input type="submit" name="create_product" Value="Add" />
                    </td>
                </tr>
            </table>
            </form>
        </div>
    </div>
</div>
<!-- Load TinyMCE -->
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        setupTinyMCE();
        setDatePicker('date-picker');
        $('input[type="checkbox"]').fancybutton();
        $('input[type="radio"]').fancybutton();
    });
</script>
<!-- Load TinyMCE -->
<?php include 'inc/footer.php';?>


