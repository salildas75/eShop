
<?php include 'include/header.php'; ?>
 <?php //include_once("ViaNettSMS.php"); ?>

 <div class="main">
    <div class="content">
    	 <div class="login_panel" id="bkash">
        	<h3>Bkash Details</h3>
        	<p>Please cash out or send money to this number(01843334756) after put your Bkash number and trxId</p>
        	
        	
        	
        	
        	<form action="" method="post">
                	<input name="bks_nmbr" type="text" placeholder="Bkash Number"/>
                    <input name="TrxID" type="password" placeholder="TrxID"/>
                    
<?php  

if(isset($_POST['submit'])){
    
    $bks_nmbr = $_POST['bks_nmbr'];
    $TrxID = $_POST['TrxID'];
    
    if($bks_nmbr!=NULL && $TrxID!=NULL){
    
    $query = "SELECT * FROM bkash ";
    $select_checkout_query = mysqli_query($connection,$query);
    
    while($row = mysqli_fetch_array($select_checkout_query)){
    
    $db_bks_nmbr = $row['bks_from'];
    $db_bks_amount = $row['bks_amount'];
    $db_bks_trxID = $row['bks_trxID'];
    
        
            if($bks_nmbr == $db_bks_nmbr && $TrxID == $db_bks_trxID ){

                if($_SESSION['grand_total'] <= $db_bks_amount){

                    echo "Hi " . $_SESSION['customer_name'] . ". Your product has been sent. Please wait for a while.</br>Thank You";
                    
                    //msg code
                    

                }else{
                    $need = $_SESSION['grand_total'] - $db_bks_amount;
                    
                    echo "Your amount is low. If you purches all product of your cart. You need send us " . $need . " Taka more."; 
                }
            }else{
                echo "Wrong input";
            }
        }
    }else{
        echo "Put your bkash number and trxId";
    }
    
}

                
?>
                
                <div class="buttons"><div><button name="submit" class="grey">Submit</button></div></div>
                    </div>
             
            </form>

     	
       <div class="clear"></div>
    </div>
 </div>
 <?php include 'include/footer.php'; ?>
