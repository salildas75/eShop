<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Change Password</h2>
        <div class="block">               
         <form action="" method="post" >
            <table class="form">					
                <tr>
                    <td>
                        <label>Old Password</label>
                    </td>
                    <td>
                        <input type="password" placeholder="Enter Old Password..."  name="old" class="medium" />
                    </td>
                </tr>
				 <tr>
                    <td>
                        <label>New Password</label>
                    </td>
                    <td>
                        <input type="password" placeholder="Enter New Password..." name="new" class="medium" />
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
            
<?php

if(isset($_POST['submit'])) {
        
    $admin_old_pass = $_POST['old'];
    $admin_new_pass = $_POST['new'];
    
    if($admin_old_pass != NULL && $admin_new_pass != NULL ){
        
$query = "SELECT * FROM admin WHERE admin_id = '{$_SESSION['admin_id']}' ";
$select_admin_query = mysqli_query($connection,$query);


while($row = mysqli_fetch_array($select_admin_query)){
    
    $db_admin_pass = $row['admin_pass'];

}
        
        if($admin_old_pass == $db_admin_pass){
            $query = "UPDATE admin SET admin_pass = '{$admin_new_pass}' WHERE admin_id = {$_SESSION['admin_id']}";
            $update_query = mysqli_query($connection,$query);


                if(!$update_query){
                    die("Query Faied" . mysqli_error($connection));
                }

                header("Location: changepassword.php");
            }else{
                echo "<span style='color:red'>Your old Password is not correct</span>";
            }
        }else{
            echo "<span style='color:red'>This field should not be empty</span>";
        }
    }
             
             
             
?>
            
            
            </form>
        </div>
    </div>
</div>
<?php include 'inc/footer.php';?>