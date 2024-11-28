<?php include('Cours-server.php') ?>	

<?php include 'header.php';?>
 <title>إضافة دورة</title>
 <?php include 'navbar.php';?>
	
   <body>
		
        <fieldset class="field_set">
    <legend><h3 class="topic1" > اضافة دورة جديدة</h3> </legend>
    
<p class="topic2" ></p>

<div class="container">
  <form  action=""  method="post"  enctype="multipart/form-data">
    
    <div class="input-group">

			<label>القسم</label>
			<select name="dep" style="font-size:x-large;width:200px" >
			<option>علوم وتكنولوجيا</option>
            <option>الأعمال والريادة</option>
            <option>الصحة والتغذية</option>
            <option>تطوير الذات</option>
			<option>اللغات والاداب</option>
			<option>فن وإعلام</option>
			</select>
        <div class="input-group">

        <label for="fname">العنوان</label>
    <input type="text"  name="topic" placeholder="عنوان الدورة" required>

    <label for="msg">التفاصيل</label>
    <textarea class="main-input" name="details"  rows="10" cols="50" placeholder="تفاصيل الدورة" required></textarea>
     
    <label for="fname">الرابط</label>
    <input type="text"  name="contact" placeholder="رابط الدورة" required >
    
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

