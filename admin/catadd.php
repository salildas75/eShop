<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Add New Category</h2>
               <div class="block copyblock"> 
                 <form method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" name="cat_title" placeholder="Enter Category Name..." class="medium" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </table>
                    </form>
<?php         
if(isset($_POST['submit'])){
    
    $cat_title = $_POST['cat_title'];
    
    
    if($cat_title == "" || empty($cat_title)){
        
        echo "This field should not be empty.";
        
    }else{
        
        $query = "INSERT INTO catagories(cat_title) ";
        $query .= "VALUE('{$cat_title}') ";
        
        $create_catagory_query = mysqli_query($connection, $query);
        echo "Catagory Added";
        if(!$create_catagory_query){
            die('Query Failed' . mysqli_error($connection));
        }
        
    }
   
    
}
?>

                    
                    
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>