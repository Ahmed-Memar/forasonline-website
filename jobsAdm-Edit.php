<?php
// include database connection file
include_once("dbConnect.php");
    
// Check if form is submitted for job update, then redirect to homepage after update
if(isset($_POST['update']))
{   
    $id = $_POST['id'];
	$dep = mysql_real_escape_string($_POST['dep']);
	$topic = mysql_real_escape_string($_POST['topic']);
	$details = mysql_real_escape_string($_POST['details']);
	$contact = mysql_real_escape_string($_POST['contact']);
    $image = $_FILES["image"]['name'];
    
		
	// update user data
	$result = mysqli_query($mysqli, "UPDATE job SET dep='$dep',topic='$topic',details='$details',contact='$contact',image='$image' WHERE id=$id");
    if ($result) {
	move_uploaded_file($_FILES["image"]["tmp_name"], "img/".$image);

    // Redirect to homepage to display updated jobs in list
    header("Location: jobsAdm.php");
} else {
	
    header("Location: jobsAdm-Edit.php");
}
	
}
?>
<?php
// Display selected jobs data based on id
// Getting id 
$id = $_GET['id'];

// Fetech user data based on id
$result = mysqli_query($mysqli, "SELECT * FROM job WHERE id=$id");
?>


<?php include 'header.php';?>
 <title>تعديل دورة</title>
 <?php include 'navbar.php';?>


<body>

        <fieldset class="field_set">
    <legend><h3 class="topic1" >تعديل فرصة عمل</h3> </legend>
    
<p class="topic2" ></p>
<?php while($row = mysqli_fetch_assoc($result)) {

           ?>
<div class="container">
  <form  name="update_user" method="post" action="jobsAdm-Edit.php"  enctype="multipart/form-data">
    
    <div class="input-group">

			<label>المجال</label>
			<select name="dep" style="font-size:x-large;width:200px" value=<?php echo $dep;?> >
			<option value="هندسة" <?php if($row['dep'] == 'هندسة'){ echo "selected";} ?> >هندسة</option>
			<option value="حرف ومهن يدوية" <?php if($row['dep'] == 'حرف ومهن يدوية'){ echo "selected";} ?> >حرف ومهن يدوية</option>
			<option value="إدارة الاعمال" <?php if($row['dep'] == 'إدارة الاعمال'){ echo "selected";} ?> >إدارة الاعمال</option>
			</select>
        <div class="input-group">

        <label for="fname">العنوان</label>
    <input type="text"  name="topic" placeholder="عنوان فرصة العمل"  value=<?php echo $row['topic']; ?> required >

    <label for="msg">التفاصيل</label>
    <textarea class="main-input" name="details"  rows="10" cols="50" placeholder="تفاصيل فرصة العمل"  required><?php echo $row['details']; ?></textarea>
     
    <label for="fname">الرابط</label>
    <input type="text"  name="contact" placeholder="رابط فرصة العمل" required value=<?php echo $row['contact']; ?> >
    
    <table> <tr> 
    <td> <label for="fname">الصورة الحالية</label></td>
    <td> <img src="img/<?php echo $row['image']; ?>" width="150px" height="150px" /> </td>
    </tr> </table>

    <label for="fname">تغيير الصورة</label>
     <input type="file" class="form-control-file" id="image" name="image" placeholder="select image" accept=".jpg, .jpeg, .png"  >
     <input type="hidden" name="id" value=<?php echo $_GET['id'];?>> 
     <input input type="submit" name="update" value="تعديل" width="150px" >
 
  </form>
</div>

<?php
                }

                   ?>

</fieldset>

	</form>

<?php include 'footer.php';?>

</body>
</html>