<?php include 'include/header.php'; ?>



 <div class="main">
    <div class="content">
    	<div class="support">
  			<div class="support_desc">
  				<h3>Live Support</h3>
  				<p><span>24 hours | 7 days a week | 365 days a year &nbsp;&nbsp; Live Technical Support</span></p>
  				<p> It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters.There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.</p>
  			</div>
  				<img src="web/images/contact.png" alt="" />
  			<div class="clear"></div>
  		</div>
    	<div class="section group">
				<div class="col span_2_of_3">
				  <div class="contact-form">
				  	<h2>Contact Us</h2>
					    <form action="" method="post">
                            
						    <div>
						    	<span><label>MESSAGE</label></span>
						    	<span><textarea name="message_content"> </textarea></span>
						    </div>
						   <div>
						   		<span><input type="submit" name="create_message" value="SUBMIT"></span>
						  </div>
					    </form>
     
                      
                      
                      
                      
<?php

if(isset($_POST['create_message'])){
    
    
$query = "SELECT * FROM customer WHERE customer_username = '{$_SESSION['customer_username']}' ";
$select_customer_query = mysqli_query($connection, $query);
    
    if(!$select_customer_query){
        
        die("QUERY FAILED ". mysqli_error($connection));
        
    }
    
while($row = mysqli_fetch_array($select_customer_query)){
    
    $db_customer_name = $row['customer_name'];
    $db_customer_mail = $row['customer_mail'];
    $db_customer_phone = $row['customer_phone'];
    
}
    
    
	
	$contact_name = $db_customer_name;
	$contact_mail = $db_customer_mail;
	$contact_phone = $db_customer_phone;
	$content_message = $_POST['message_content'];
	
	if($content_message==" "){
		echo "<span style = 'color:red'>Content should not be empty</span>";
	}else{
		$query = "INSERT INTO contact (	contact_name, contact_mail, contact_phone, contact_message, contact_date ) ";
		$query .= "VALUES ('{$contact_name}', '{$contact_mail}', '{$contact_phone}', '{$content_message}', now()) ";
		
		$create_message_query = mysqli_query($connection,$query);
		
		
		if(!$create_message_query){
			
			die('QUERY FAILED') . mysqli_error();
            
		}
        echo "Your message has been sent. <br>Thank you!<br>" . $contact_name;
	}
	
}

?>   
                      
                      
                      
                      
                      
				  </div>
  				</div>
				<div class="col span_1_of_3">
      			<div class="company_address">
				     	<h2>Company Information :</h2>
						    	<p>500 Lorem Ipsum Dolor Sit,</p>
						   		<p>22-56-2-9 Sit Amet, Lorem,</p>
						   		<p>Bangladesh</p>
				   		<p>Phone:(00) 222 666 444</p>
				   		<p>Fax: (000) 000 00 00 0</p>
				 	 	<p>Email: <span>info@mycompany.com</span></p>
				   		<p>Follow on: <span>Facebook</span>, <span>Twitter</span></p>
				   </div>
				 </div>
			  </div>    	
    </div>
 </div>

 <?php include 'include/footer.php'; ?>
