<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>



<?php //Add product query

if(isset($_GET['edit'])){
    
    $the_product_id = $_GET['edit'];
    
}

    
    $query = "SELECT * FROM products where product_id = $the_product_id ";
    $select_products = mysqli_query($connection,$query);
                
    while($row = mysqli_fetch_assoc($select_products)){
        
        $product_id = $row['product_id'];
        $product_title = $row['product_title'];
        $product_cat = $row['product_cat'];
        $product_details = $row['product_details'];

        $product_image = $row['product_img'];

        $product_prize = $row['product_prize'];
        $product_type = $row['product_type'];
        $product_brand = $row['product_brand'];
    }
    
if(isset($_POST['edit_product'])){
    
    $product_title = $_POST['product_title'];
    $product_cat = $_POST['product_cat'];
    $product_details = $_POST['product_details'];
    
    $product_image = $_FILES['image']['name'];
    $product_image_temp = $_FILES['image']['tmp_name'];
    
    $product_prize = $_POST['product_prize'];
    $product_type = $_POST['product_type'];
    $product_brand = $_POST['product_brand'];
    
move_uploaded_file($product_image_temp, "img/products_img/$product_image");
    
    
    $query = "UPDATE products SET ";
    $query .="product_title = '{$product_title}', ";
    $query .="product_cat = '{$product_cat}', ";
    $query .="product_details = '{$product_details}', ";
    $query .="product_img = '{$product_image}', ";
    $query .="product_prize = '{$product_prize}', ";
    $query .="product_type = '{$product_type}', ";
    $query .="product_brand = '{$product_brand}' ";
    $query .="WHERE product_id = '{$the_product_id}' ";
    
    
        if(empty($product_image)){
        
        $query = "SELECT * FROM products WHERE product_id = $the_product_id ";
        $select_image = mysqli_query($connection,$query);
        
        while($row = mysqli_fetch_array($select_image)){
            
        $product_image = $row['product_img'];
            
        }
        
        
    }
    
$edit_query = mysqli_query($connection,$query);

    
    if($edit_query){
        
        header("Location: productlist.php");
        echo "<p class='bg-success'>Product Updated.</p>";
        
    }else{
        die('Query Faild' . mysqli_error($connection));
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
                        <input type="text" name="product_title" value="<?php echo $product_title; ?>" class="medium" />
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Category</label>
                    </td>
    
                    <td>
                        <select id="select" name="product_cat">
                           
                           
        
<?php

        $query = "SELECT * FROM catagories";
        $select_catagory = mysqli_query($connection,$query);
            
            
        while($row = mysqli_fetch_assoc($select_catagory)){
        $cat_id = $row['cat_id'];
        $cat_title = $row['cat_title'];
            
            echo "<option value='$cat_title'>{$cat_title}</option>";
            
            
            
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
                        <input type="text" name="product_brand" value="<?php echo $product_brand; ?>" class="medium" />
                    </td>
                </tr>
				
				 <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Description</label>
                    </td>
                    <td>
                        <textarea class="tinymce" name="product_details" value="<?php echo $product_details; ?>"></textarea>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Price</label>
                    </td>
                    <td>
                        <input type="text" name="product_prize" value="<?php echo $product_prize; ?>" class="medium" />
                    </td>
                </tr>
            
                <tr>
                    <td>
                        <label>Upload Image</label>
                    </td>
                    <td>
                        <input type="file" name="image" value="<?php echo $product_image; ?>"/>
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
                        <input type="submit" name="edit_product" Value="Edit" />
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


