<?php 

	// connect to database
	$conn = mysqli_connect("localhost", "root", "", "forasonline");
    // Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

    ?>



<?php include 'header.php';?>
 <title>تعديل دورة</title>
 <?php include 'navbar.php';?>

 
 <?php //modify
 $names = $_POST['searchtext'];
 if($_FILES["image"]["error"] == 4){
        echo
        "<script> alert('Image Does Not Exist'); </script>"
        ;
  }
  else{
    $fileName = $_FILES["image"]["name"];
    $fileSize = $_FILES["image"]["size"];
    $tmpName = $_FILES["image"]["tmp_name"];

    $validImageExtension = ['jpg', 'jpeg', 'png'];
    $imageExtension = explode('.', $fileName);
    $imageExtension = strtolower(end($imageExtension));
    if ( !in_array($imageExtension, $validImageExtension) ){
      echo
      "
      <script>
        alert('Invalid Image Extension');
      </script>
      ";
    }
    else if($fileSize > 1000000){
      echo
      "
      <script>
        alert('Image Size Is Too Large');
      </script>
      ";
    }
    else{
      $newImageName = uniqid();
      $newImageName .= '.' . $imageExtension;

      move_uploaded_file($tmpName, 'img/' . $newImageName);
      
      echo
      "
      <script>
        alert('Successfully Added');
      </script>
      ";
    }
  }
 if (isset($_POST['modi'])) {


    $sql1 = "UPDATE courses set dep='" . $_POST['dep'] . "', topic='" . $_POST['topic'] . "', details='" . $_POST['details'] . "', image='" . $newImageName . "', contact='" . $_POST['contact'] . "' WHERE topic=$names "; // update form data from the database
  $result=mysqli_query($conn,$sql1);

if ($result) {

  echo "Record updated successfully";
} else {
  echo "Error updating record: " . $conn->error;
}}
      //endmodify
?>

         
    
    
<p class="topic2" ></p>

<div class="container">
  <form  action=""  method="post"  enctype="multipart/form-data">
    
    <div class="input-group">

             <label for="fname">ابحث عن عنوان الدورة لتعديلها</label>
    <input type="text"  name="searchtext" placeholder="عنوان الدورة" required>
    <input type="submit" value="بحث" name="search">
    <section class="newest-courses" id="newest">
        <div class="courses-section">
         <form method="post" action="index1.php">  
         <div class="courses">

    <?php  if (isset($_POST['search'])) {
    
    $result = mysqli_query($conn, "SELECT * FROM courses WHERE topic=$names ");

          if (mysqli_num_rows($result) > 0) 
             {
          while ($row = mysqli_fetch_array($result))
        {
             
           ?>
            
            <div class="cours"/>
                    <img src="img/<?php echo $row['image']; ?>"  style="width:100%"/>
                    <h3> <?php echo $row['topic']; ?> </h3>
					<h6>الفئة : <?php echo $row['dep']; ?> </h6>
					<h5> <?php echo $row['details']; ?> </h5>
						
                 <button class="bt">
                <a href="<?php echo $row['contact']; ?>">رابط الدورة</a>
            </button>
                </div>
                
                <?php
        }
         ?>    </div>    <?php
        }
             else { ?>
	                  <label>لا يوجد أي دورة بهذا الاسم</label>
                      <br>
                      <?php
                  }}
                   ?>


             </div>
            <fieldset class="field_set">
 <legend><h3 class="topic1" >تعديل الدورة</h3> </legend>
			<label>القسم</label>
			<select name="dep" style="font-size:x-large;width:200px" >
			<option>علوم وتكنولوجيا</option>
			<option>اللغات والاداب</option>
			<option>فن وإعلام</option>
			</select>
        <div class="input-group">

        <label for="fname">العنوان</label>
    <input type="text"  name="topic" placeholder="عنوان الدورة">

    <label for="msg">التفاصيل</label>
    <textarea class="main-input" name="details"  rows="10" cols="50" placeholder="تفاصيل الدورة" ></textarea>
     
    <label for="fname">الرابط</label>
    <input type="text"  name="contact" placeholder="رابط الدورة"  >

    
    <label>أضف صورة</label>
    <input type="file" name="image" id="image"  accept=".jpg, .jpeg, .png" value=""  >
    
    <input type="submit" value="تعديل" name="modi">
    
    <input type="submit" value="حذف" name="dele">
  </form>
</div>
</fieldset>
	</form>
    </div>
	</div>
	</div>

    
</body>
</html>