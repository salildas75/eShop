<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Update Site Title and Description</h2>
        <div class="block sloginblock">               
         <form method="post">
            <table class="form">					
				 <tr>
                    <td>
                        <label>Website Slogan</label>
                    </td>
                    <td>
                        <input type="text" placeholder="Enter Website Slogan..." name="slogan" class="medium" />
                    </td>
                </tr>
				 
				
				 <tr>
                    <td>
                    </td>
                    <td>
                        <input type="submit" name="submit" Value="Update" />
                    </td>
                </tr>
            </table>
        </form>
        
<?php
if(isset($_POST['submit'])){
    
    $slogan = $_POST['slogan'];
    
    
    if($slogan == "" || empty($slogan)){
        
        echo "<h3>This field should not be empty.</h3>";
        
    }else{
        
        $query = "INSERT INTO slogan(slogan) ";
        $query .= "VALUE('{$slogan}') ";
        
        $create_slogan_query = mysqli_query($connection, $query);
        if(!$create_slogan_query){
            die('Query Failed' . mysqli_error($connection));
        }
        echo "<h3>Slogan Updated</h3>";
        
    }
   
    
}
	
?>
        
        </div>
    </div>
</div>
<?php include 'inc/footer.php';?>