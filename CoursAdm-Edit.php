<?php
// include database connection file
include_once("dbConnect.php");
    
// Check if form is submitted for course update, then redirect to course admin after update
if(isset($_POST['update']))
{   
    $id = $_POST['id'];
	$dep = mysql_real_escape_string($_POST['dep']);
	$topic = mysql_real_escape_string($_POST['topic']);
	$details = mysql_real_escape_string($_POST['details']);
	$contact = mysql_real_escape_string($_POST['contact']);
    $image = $_FILES["image"]['name'];
    
		
	// update course data
	$result = mysqli_query($mysqli, "UPDATE courses SET dep='$dep',topic='$topic',details='$details',contact='$contact',image='$image' WHERE id=$id");
    if ($result) {
	move_uploaded_file($_FILES["image"]["tmp_name"], "img/".$image);

    // Redirect to course admin to display updated course in list
    header("Location: CoursAdm.php");
} else {
	
    header("Location: CoursAdm-Edit.php");
}
	
}
?>
<?php
// Display selected course data based on id
// Getting id 
$id = $_GET['id'];

// Fetech course data based on id
$result = mysqli_query($mysqli, "SELECT * FROM courses WHERE id=$id");
?>


<?php include 'header.php';?>
 <title>تعديل دورة</title>
 <?php include 'navbar.php';?>


<body>

        <fieldset class="field_set">
    <legend><h3 class="topic1" >تعديل الدورة</h3> </legend>
    
<p class="topic2" ></p>
<?php while($row = mysqli_fetch_assoc($result)) {

           ?>
<div class="container">
  <form  name="update_user" method="post" action="CoursAdm-Edit.php"  enctype="multipart/form-data">
    
    <div class="input-group">

			<label>القسم</label>
			<select name="dep" style="font-size:x-large;width:200px" value=<?php echo $dep;?> >
			<option value="علوم وتكنولوجيا" <?php if($row['dep'] == 'علوم وتكنولوجيا'){ echo "selected";} ?> >علوم وتكنولوجيا</option>
            <option value="الأعمال والريادة" <?php if($row['dep'] == 'الأعمال والريادة'){ echo "selected";} ?> >الأعمال والريادة</option>
            <option value="الصحة والتغذية" <?php if($row['dep'] == 'الصحة والتغذية'){ echo "selected";} ?> >الصحة والتغذية</option>
            <option value="تطوير الذات" <?php if($row['dep'] == 'تطوير الذات'){ echo "selected";} ?> >تطوير الذات</option>
			<option value="اللغات والاداب" <?php if($row['dep'] == 'اللغات والاداب'){ echo "selected";} ?> >اللغات والاداب</option>
			<option value="فن وإعلام" <?php if($row['dep'] == 'فن وإعلام'){ echo "selected";} ?> >فن وإعلام</option>
			</select>
        <div class="input-group">

        <label for="fname">العنوان</label>
    <input type="text"  name="topic" placeholder="عنوان الدورة"  value=<?php echo $row['topic']; ?> required >

    <label for="msg">التفاصيل</label>
    <textarea class="main-input" name="details"  rows="10" cols="50" placeholder="تفاصيل الدورة"  required><?php echo $row['details']; ?></textarea>
     
    <label for="fname">الرابط</label>
    <input type="text"  name="contact" placeholder="رابط الدورة" required value=<?php echo $row['contact']; ?> >
    
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