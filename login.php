
<?php include 'include/header.php'; ?>

 <div class="main">
    <div class="content">
    	 <div class="login_panel">
        	<h3>Existing Customers</h3>
        	<p>Sign in with the form below.</p>
        	<form action="" method="post">
                	<input name="username" type="text" placeholder="Username"/>
                    <input name="password" type="password" placeholder="*****"/>
                
                <div class="buttons"><div><button name="login" class="grey">Sign In</button></div></div>
                    </div>
             
            </form>

        
        
<?php
if(isset($_POST['login'])){
    
   $customer_username = $_POST['username'];
   $customer_password = $_POST['password'];
    
    if($customer_username!=NULL && $customer_password!=NULL){
    
$customer_username = mysqli_real_escape_string($connection, $customer_username);
$customer_password = mysqli_real_escape_string($connection, $customer_password);
    
    
$query = "SELECT * FROM customer WHERE customer_username = '{$customer_username}' ";
$select_customer_query = mysqli_query($connection, $query);
    
    if(!$select_customer_query){
        
        die("QUERY FAILED ". mysqli_error($connection));
        
    }
    
while($row = mysqli_fetch_array($select_customer_query)){
    
    $db_customer_id = $row['customer_id'];
    $db_customer_username = $row['customer_username'];
    $db_customer_phone = $row['customer_phone'];
    $db_customer_name = $row['customer_name'];
    $db_customer_password = $row['customer_pass'];
    
}
    
    
    
        if($customer_password == $db_customer_password){

            $_SESSION['customer_username'] = $db_customer_username;
            $_SESSION['customer_name'] = $db_customer_name;
            $_SESSION['customer_phone'] = $db_customer_phone;
            $_SESSION['customer_id'] = $db_customer_id;

            header("Location: profile.php");

        }else{

            header("Location: login.php");

        }
    
    
    }else{
        header("Location: login.php");
    }

}
?>
        
        
        
        
        
        
        
    	<div class="register_account">
    		<h3>Register New Account</h3>
    		<form action="" method="post">
		   			 <table>
		   				<tbody>
						<tr>
						<td>
							<div>
							<input type="text" name="name" placeholder="Name" />
							</div>
							
							<div>
							   <input type="text" name="address" placeholder="Address" />
							</div>
							
							<div>
								<input type="text" name="city" placeholder="City" />
							</div>
							<div>
								<input type="text" name="country" placeholder="Country" />
							</div>
		    			 </td>
		        <td>
						<div>
							<input type="text" name="zip" placeholder="Zip-Code" />
						</div>
                            
		    		    <div>
							<input type="text" name="phone" placeholder="Phone" />
						</div>	        
	
		                <div>
							<input type="text" name="email" placeholder="Email" />
						</div>
				  
                        <div>
							<input type="text" name="username" placeholder="Username" />
						</div>
                            
				        <div>
							<input type="text" name="pass" placeholder="****" />
						</div>
		    	</td>
		    </tr> 
		    </tbody></table> 
		   <div class="search"><div><button class="grey" name="register">Create Account</button></div></div>
		    <p class="terms">By clicking 'Create Account' you agree to the <a href="#">Terms &amp; Conditions</a>.</p>
		    <div class="clear"></div>
		    </form>
            
<?php           
if(isset($_POST['register'])){
    
    $name = $_POST['name'];
    $address  = $_POST['address'];
    $city     = $_POST['city'];
    $country  = $_POST['country'];
    $zip      = $_POST['zip'];
    $phone    = $_POST['phone'];
    $email    = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['pass'];
    
    
if(!empty($name) && !empty($username) && !empty($email) && !empty($password)){
        
    $name = mysqli_real_escape_string($connection,$username);
    $address = mysqli_real_escape_string($connection,$address);
    $city = mysqli_real_escape_string($connection,$city);
    $country = mysqli_real_escape_string($connection,$country);
    $zip = mysqli_real_escape_string($connection,$zip);
    $phone = mysqli_real_escape_string($connection,$phone);
    $email = mysqli_real_escape_string($connection,$email);
    $username    = mysqli_real_escape_string($connection,$username);
    $password = mysqli_real_escape_string($connection,$password);
    
    $query = "INSERT INTO customer (customer_name, customer_address, customer_city, customer_country, customer_zip, customer_phone, customer_mail, 	customer_username, customer_pass) ";
    $query .= "VALUES('{$name}','{$address}','{$city}','{$country}','{$zip}','{$phone}','{$email}','{$username}','{$password}' ) ";
    $register_customer_query = mysqli_query($connection,$query);
    
        if(!$register_customer_query){        
            die("QUERY FAILED " . mysqli_error($connection) . ' ' . mysqli_errno($connection));        
        }
 
$message = "Your Registration has been submitted";
        
        
        
    }else{
    
    $message = "Fields cannot be empty";
            
    }
    

}else{
    
    $message ="";
}
            
?>
            
            
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
 <?php include 'include/footer.php'; ?>
