<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Add New Slider</h2>
    <div class="block">               
         <form action="" method="post" enctype="multipart/form-data">
            <table class="form">          
        
               <tr>
                    <td>
                        <label>Slider Title</label>
                    </td>
                    <td>
                        <input type="text" name="slider_title" placeholder="Enter title.." />
                    </td>
                </tr>
               
                <tr>
                    <td>
                        <label>Upload Image</label>
                    </td>
                    <td>
                        <input type="file" name="image"/>
                    </td>
                </tr>
				<tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="Save" />
                    </td>
                </tr>
            </table>
            </form>
            
<?php //Add post query

if(isset($_POST['submit'])){
    
    $slider_title = $_POST['slider_title'];
    $slider_image = $_FILES['image']['name'];
    $slider_image_temp = $_FILES['image']['tmp_name'];
        

    if($slider_image && $slider_title){
        move_uploaded_file($slider_image_temp,"../images/$slider_image");
    
        $query = "INSERT INTO slider(slider_title, slider_img) ";

        $query .= "VALUES('{$slider_title}', '{$slider_image}') ";

        $create_slider_query = mysqli_query($connection, $query);
        echo "Slider Uploaded";

    }else{
        echo "This field should not blank";
    }
}


?>
            
            
            
        </div>
    </div>
</div>
<!-- Load TinyMCE -->
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        setupTinyMCE();
        setDatePicker('date-picker');
        $('input[type="checkbox"]').fancybutton();
        $('input[type="radio"]').fancybutton();
    });
</script>
<!-- Load TinyMCE -->
<?php include 'inc/footer.php';?>