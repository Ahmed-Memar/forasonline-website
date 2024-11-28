<?php
// include database connection file
include_once("dbConnect.php");
    
// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{   
    $id = $_POST['id'];
	$dep = mysql_real_escape_string($_POST['dep']);
	$topic = mysql_real_escape_string($_POST['topic']);
	$details = mysql_real_escape_string($_POST['details']);
	$contact = mysql_real_escape_string($_POST['contact']);
    $image = $_FILES["image"]['name'];
    
		
	// update user data
	$result = mysqli_query($mysqli, "UPDATE scholarship SET dep='$dep',topic='$topic',details='$details',contact='$contact',image='$image' WHERE id=$id");
    if ($result) {
	move_uploaded_file($_FILES["image"]["tmp_name"], "img/".$image);

    // Redirect to homepage to display updated user in list
    header("Location: schoAdm.php");
} else {
	
    header("Location: schoAdm-Edit.php");
}
	
}
?>
<?php
// Display selected user data based on id
// Getting id 
$id = $_GET['id'];

// Fetech user data based on id
$result = mysqli_query($mysqli, "SELECT * FROM scholarship WHERE id=$id");
?>


<?php include 'header.php';?>
 <title>تعديل منحة</title>
 <?php include 'navbar.php';?>


<body>

        <fieldset class="field_set">
    <legend><h3 class="topic1" >تعديل المنحة</h3> </legend>
    
<p class="topic2" ></p>
<?php while($row = mysqli_fetch_assoc($result)) {

           ?>
<div class="container">
  <form  name="update_user" method="post" action="schoAdm-Edit.php"  enctype="multipart/form-data">
    
    <div class="input-group">

			<label>القسم</label>
			<select name="dep" style="font-size:x-large;width:200px" value=<?php echo $dep;?> >
			<option value="بكالوريوس" <?php if($row['dep'] == 'بكالوريوس'){ echo "selected";} ?> >بكالوريوس</option>
			<option value="ماستر" <?php if($row['dep'] == 'ماستر'){ echo "selected";} ?> >ماستر</option>
			<option value="دكتوراه" <?php if($row['dep'] == 'دكتوراه'){ echo "selected";} ?> >دكتوراه</option>
            <option value="جميع المستويات" <?php if($row['dep'] == 'جميع المستويات'){ echo "selected";} ?> >جميع المستويات</option>
			</select>
        <div class="input-group">

        <label for="fname">العنوان</label>
    <input type="text"  name="topic" placeholder="عنوان المنحة"  value=<?php echo $row['topic']; ?> required >

    <label for="msg">التفاصيل</label>
    <textarea class="main-input" name="details"  rows="10" cols="50" placeholder="تفاصيل المنحة"  required><?php echo $row['details']; ?></textarea>
     
    <label for="fname">الرابط</label>
    <input type="text"  name="contact" placeholder="رابط المنحة" required value=<?php echo $row['contact']; ?> >
    
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