<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Post List</h2>
        <div class="block">  
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th>Product Title</th>
					<th>Description</th>
					<th>Category</th>
					<th>Image</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				

<?php			
$query = "SELECT * FROM products ORDER BY product_id DESC ";
$select_products = mysqli_query($connection,$query);
                
    while($row = mysqli_fetch_assoc($select_products)){
        
    $product_id = $row['product_id'];
    $product_title = $row['product_title'];
    $product_cat = $row['product_cat'];
    $product_details = substr($row['product_details'],0,50);
    
    $product_image = $row['product_img'];
      
    $product_prize = $row['product_prize'];
    $product_type = $row['product_type'];
    $product_brand = $row['product_brand'];
			
?>		
			
			    <tr class="gradeU">
                    <td><h3><?php echo $product_title; ?></h3></td>
					<td><?php echo $product_details; ?></td>
					<td><?php echo $product_cat; ?></td>
					<td class="center"><img width = '100' src='img/products_img/<?php echo $product_image; ?>' alt = 'imagee'></td>
					
<?php
echo "<td><a href='productedit.php?edit={$product_id}'>Edit</a> || <a onClick=\"javascript: return confirm('Are you sure you want to delete'); \" href='productlist.php?delete={$product_id}'>Delete</a></td>";
?>
                
                
                
<?php // product delete query
if(isset($_GET['delete'])) {
    $the_product_id = $_GET['delete'];
    $query = "DELETE FROM products WHERE product_id = {$the_product_id}";
    $delete_query = mysqli_query($connection,$query);
    header("Location: productlist.php");
            
        
    }

?>
					
				</tr>
				
				
<?php } ?>				
			</tbody>
		</table>

       </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        setupLeftMenu();
        $('.datatable').dataTable();
		setSidebarHeight();
    });
</script>
<?php include 'inc/footer.php';?>
