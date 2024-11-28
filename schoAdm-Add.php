<?php include('scholarship-server.php') ?>	

<?php include 'header.php';?>
 <title>إضافة دورة</title>
 <?php include 'navbar.php';?>
	
   <body>
		
        <fieldset class="field_set">
    <legend><h3 class="topic1" >اضافة منحة جديدة</h3> </legend>
    
<p class="topic2" ></p>

<div class="container">
  <form  action=""  method="post"  enctype="multipart/form-data">
    
    <div class="input-group">

			<label>القسم</label>
			<select name="dep" style="font-size:x-large;width:200px" >
			<option>بكالوريوس</option>
			<option>ماستر</option>
			<option>دكتوراه</option>
            <option>جميع المستويات</option>
			</select>
        <div class="input-group">

        <label for="fname">العنوان</label>
    <input type="text"  name="topic" placeholder="عنوان المنحة" required>

    <label for="msg">التفاصيل</label>
    <textarea class="main-input" name="details"  rows="10" cols="50" placeholder="تفاصيل المنحة" required></textarea>
     
    <label for="fname">الرابط</label>
    <input type="text"  name="contact" placeholder="رابط المنحة" required >

    
    <label>أضف صورة</label>
    <input type="file" name="image" id = "image" accept=".jpg, .jpeg, .png" value="" required >
    
    <input type="submit" value="إضافة" name="add">
  </form>
</div>
</fieldset>

	</form>

<?php include 'footer.php';?>

</body>
</html>

