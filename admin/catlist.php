<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Category List</h2>
                <div class="block">
                   <form action="" method="post">      
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Catagory Id.</th>
							<th>Category Name</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>

<?php
                        
    $query = "SELECT * FROM catagories ";
    $select_catagory = mysqli_query($connection,$query);

    while($row = mysqli_fetch_assoc($select_catagory)){
    $cat_id = $row['cat_id'];
    $cat_title = $row['cat_title'];

    echo '<tr class="odd gradeX">';
    echo "<td>{$cat_id}</td>";
    echo "<td>{$cat_title}</td>";
    
    echo "<td><a href='catlist.php?edit={$cat_id}'>Edit</a> || <a onClick=\"javascript: return confirm('Are you sure you want to delete'); \" href='catlist.php?delete={$cat_id}'>Delete</a></td>";
    echo "</tr>";
    
    }
?>				
			
					
							
									
																
																					
		
<!--Catagory list starts here				-->
					
    <?php
    if(isset($_GET['edit'])){
        
        $cat_id = $_GET['edit'];
        
        $query = "SELECT * FROM catagories WHERE cat_id = $cat_id";
        $select_catagory_id = mysqli_query($connection,$query);

        while($row = mysqli_fetch_assoc($select_catagory_id)){
        $cat_id = $row['cat_id'];
        $cat_title = $row['cat_title'];
            
       ?>  

     <input value="<?php if(isset($cat_title)){echo $cat_title;} ?>" type="text" class="form-control" name="cat_title">
        <div class="form-group">
            <input class="btn btn-primary" type="submit" name="update_catagory" value="Update Category">
        </div>

        
    <?php        
        }
    }
    ?>

<!--Catagory List Ends Here                                   -->
                              
                                                            
                                                                                                                        
<!--Catagory edit query starts here              -->                           
    <?php    //UPDATE QUERY
    if(isset($_POST['update_catagory'])){
    $the_cat_title = $_POST['cat_title'];
    $query = "UPDATE catagories SET cat_title = '{$the_cat_title}' WHERE cat_id = {$cat_id}";
    $update_query = mysqli_query($connection,$query);
    echo "<p class='bg-success'>Updated Successfull. <a href='catlist.php'>Go to Category Page</a></p>";
    
        if(!$update_query){
            die("Query Faied" . mysqli_error($connection));
        }
    }                               
                                    
    ?>	
<!--Catagory edit query ends here 					-->


<!--Catagory delete query starts here 					-->
<?php
if(isset($_GET['delete'])) {
    $the_cat_id = $_GET['delete'];
    $query = "DELETE FROM catagories WHERE cat_id = {$the_cat_id}";
    $delete_query = mysqli_query($connection,$query);
    header("Location: catlist.php");
            
        
    }

?>
<!--Catagory delete query ends here 					-->
					
						
					</tbody>
				 </table>
                </form>
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

