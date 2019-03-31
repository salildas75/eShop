<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Inbox</h2>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Name</th>
							<th>Message</th>
							<th>Email</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					
					
<?php			
$query = "SELECT * FROM contact ORDER BY contact_id DESC ";
$select_contact = mysqli_query($connection,$query);
    $serial_no = 0;
    while($row = mysqli_fetch_assoc($select_contact)){
        
    $contact_id = $row['contact_id'];
    $contact_name = $row['contact_name'];
    $contact_mail = $row['contact_mail'];
    $contact_message = substr($row['contact_message'],0,50);
    $contact_phone = $row['contact_phone'];
    $contact_date = $row['contact_date'];
        $serial_no++;
?>	
					
					
					
						<tr class="odd gradeX">
                            <td><?php echo $serial_no ?></td>
							<td><h6><?php echo $contact_name; ?></h6></td>
							<td><?php echo $contact_message; ?></td>
							<td><?php echo $contact_mail; ?></td>

                            
<?php
echo "<td><a onClick=\"javascript: return confirm('Are you sure you want to delete'); \" href='inbox.php?delete={$contact_id}'>Delete</a></td>";
        
        
// Message delete query
if(isset($_GET['delete'])) {
    $the_contact_id = $_GET['delete'];
    $query = "DELETE FROM contact WHERE contact_id = {$the_contact_id} ";
    $delete_query = mysqli_query($connection,$query);
    header("Location: inbox.php");
            
        
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
