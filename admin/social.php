<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Update Social Media</h2>
        <div class="block">               
         <form method="post">
            <table class="form">					
                <tr>
                    <td>
                        <label>Facebook</label>
                    </td>
                    <td>
                        <input type="text" name="facebook" placeholder="Facebook link.." class="medium" />
                    </td>
                </tr>
				 <tr>
                    <td>
                        <label>Twitter</label>
                    </td>
                    <td>
                        <input type="text" name="twitter" placeholder="Twitter link.." class="medium" />
                    </td>
                </tr>
				
				 <tr>
                    <td>
                        <label>LinkedIn</label>
                    </td>
                    <td>
                        <input type="text" name="linkedin" placeholder="LinkedIn link.." class="medium" />
                    </td>
                </tr>
				
				 <tr>
                    <td>
                        <label>Google Plus</label>
                    </td>
                    <td>
                        <input type="text" name="googleplus" placeholder="Google Plus link.." class="medium" />
                    </td>
                </tr>
				
				 <tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="Update" />
                    </td>
                </tr>
            </table>
            </form>
            
            
            
            
            
<?php
if(isset($_POST['submit'])){
    
    $fb = $_POST['facebook'];
    $twtr = $_POST['twitter'];
    $linked_in = $_POST['linkedin'];
    $google = $_POST['googleplus'];
    
    
    if($fb == "" && $twtr == "" && $linked_in == "" && $google == "" ){
        
        echo "<h3>This field should not be empty.</h3>";
        
    }else{
        
        $query = "INSERT INTO social_acc(fb, twtr, linked_in, google ) ";
        $query .= "VALUE('{$fb}','{$twtr}','{$linked_in}','{$google}') ";
        
        $create_social_query = mysqli_query($connection, $query);
        if(!$create_social_query){
            die('Query Failed' . mysqli_error($connection));
        }
        
    }
   
    
}
	
?>
            
            
            
            
        </div>
    </div>
</div>
<?php include 'inc/footer.php';?>