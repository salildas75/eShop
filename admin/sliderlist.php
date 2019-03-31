<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Slider List</h2>
        <div class="block">  
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th>Slider Id.</th>
					<th>Slider Title</th>
					<th>Slider Image</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
                
                
<?php
                        
    $query = "SELECT * FROM slider ";
    $select_slider = mysqli_query($connection,$query);

    while($row = mysqli_fetch_assoc($select_slider)){
    $slider_id = $row['slider_id'];
    $slider_title = $row['slider_title'];
    $slider_img = $row['slider_img'];

    echo '<tr class="odd gradeX">';
    echo "<td>{$slider_id}</td>";
    echo "<td>{$slider_title}</td>";
    echo "<td><img width = '100' src='../images/$slider_img' alt = 'imagee'></td>";
    
    echo "<td><a href='sliderlist.php?edit={$slider_id}'>Edit</a> || <a onClick=\"javascript: return confirm('Are you sure you want to delete'); \" href='sliderlist.php?delete={$slider_id}'>Delete</a></td>";
    echo "</tr>";
    
    }
?>
                
                
                
                

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
