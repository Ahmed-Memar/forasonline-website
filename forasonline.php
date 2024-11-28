<?php include 'header.php';?>
 <title>فرص اون لاين</title>
 <?php include 'navbar.php';?>
 <?php include_once("dbConnect.php");?>

    <!-- first SECTION -->
    <section class="hero">
        <div class="hero-section">
            <div class="content">
                <h4> في موقع واحد ! </h4>
                <h1>
                    اكتشف واحصل على العديد من فرص العمل والمنح الدراسية والدورات التدريبية في مختلف المجالات
                </h1>
                <p>
                    فرصتك لصقل مهاراتك وايجاد العمل
                    <b> <span class="purple"> المناسب لك </span> </b>
</p>
                <button class="btn"><a href="about.php"> من نحن </a></button>
            </div>
            <div class="hero-image">
                <img src="./images/smartphone.png" alt="هاتف ذكي" />
            </div>
        </div>
    </section>

    <!-- second Section -->
    <section class="features" id="features">
        <div class="features-section">
            <h4>اختر الفئة</h4>
            <div class="qualities">
			   <a class="linka" href="#"  >
                <div class="quality" >
                    <i class="fas fa-book"></i>
                    <h3>دورات وتدريبات</h3>
                    <p>دورات مختلفة مع شهادات معتمدة</p>
                </div> </a>
				<a class="linka" href="#"  >
                <div class="quality">
                    <i class="fas fa-briefcase"></i>
                    <h3>فرص عمل</h3>
                    <p>اكتشف العديد من فرص العمل المناسبة لك</p>
                </div> </a>
				<a class="linka" href="#"  >
                <div class="quality">
                    <i class="fas fa-hands-usd"></i>
                    <h3>منح دراسية</h3>
                    <p>تقدم للحصول على أفضل المنح الدراسية</p>
                </div></a>
                <a class="linka" href="contact.php"  >
                <div class="quality">
                    <i class="fas fa-phone-square"></i>
                    <h3>تواصل معنا</h3>
                    <p>أضف فرصتك وأرسل نصائحك لتطوير محتوانا</p>
                </div></a>
            </div>
        </div>
    </section>

    <!-- courses -->
    <section class="newest-courses" id="newest">
        <div class="courses-section">
		<fieldset class="field_set"> 
         <legend><h4>الدورات المضافة حديثاً</h4> </legend>

         <form method="post" action="">  
         <div class="courses">
         
         <?php
          $i=0;  
             $sql = "SELECT * FROM courses ORDER BY id DESC;";
             $result = mysqli_query($mysqli, $sql);
             
             if (mysqli_num_rows($result) > 0) 
             {
                // output data of each row
                while($row = mysqli_fetch_assoc($result)) {
                if($i<6){
           ?>
                    <div class="cours">
                    <img src="img/<?php echo $row['image']; ?>"  style="width:100%"/>
                    <h3> <?php echo $row['topic']; ?> </h3>
					<h6>الفئة : <?php echo $row['dep']; ?> </h6>
					<h5> <?php echo $row['details']; ?> </h5>
						
                 <button class="bt">
                <a href="<?php echo $row['contact']; ?>">رابط الدورة</a>
            </button>
                </div>
                
                <?php
                $i++;}}

             }
             else {
	                  echo "لا يوجد دورات مضافة حاليا";
                   }
                   ?>
        </div>   
             <button class="btn">
             <a href="courses.php">تصفح جميع الدورات</a>
            </button>
			</fieldset>
        </div>
        </form>
    </section> 
        
	 
	
	<!-- scholarship -->
        <section class="newest-courses" id="newest">
        <div class="courses-section">
		<fieldset class="field_set"> 
         <legend><h4>المنح المضافة حديثاً</h4> </legend>

         <form method="post" action="">  
         <div class="courses">
         
         <?php
          $i=0;  
             $sql = "SELECT * FROM scholarship ORDER BY id DESC;";
             $result = mysqli_query($mysqli, $sql);
             
             if (mysqli_num_rows($result) > 0) 
             {
                // output data of each row
                while($row = mysqli_fetch_assoc($result)) {
                if($i<6){
           ?>
                    <div class="cours">
                    <img src="img/<?php echo $row['image']; ?>"  style="width:100%"/>
                    <h3> <?php echo $row['topic']; ?> </h3>
					<h6>الفئة : <?php echo $row['dep']; ?> </h6>
					<h5> <?php echo $row['details']; ?> </h5>
						
                 <button class="bt">
                <a href="<?php echo $row['contact']; ?>">رابط المنحة</a>
            </button>
                </div>
                
                <?php
                $i++;}}

             }
             else {
	                  echo "لا يوجد منح مضافة حاليا";
                   }
                   ?>
        </div>   
             <button class="btn">
             <a href="scholarship.php">تصفح جميع المنح</a>
            </button>
			</fieldset>
        </div>
        </form>
    </section>
	
	<!-- jobs -->
    <section class="newest-courses" id="newest">
        <div class="courses-section">
		<fieldset class="field_set"> 
         <legend><h4>فرص العمل المضافة حديثاً</h4> </legend>

         <form method="post" action="">  
         <div class="courses">
         
         <?php
          $i=0;  
             $sql = "SELECT * FROM job ORDER BY id DESC;";
             $result = mysqli_query($mysqli, $sql);
             
             if (mysqli_num_rows($result) > 0) 
             {
                // output data of each row
                while($row = mysqli_fetch_assoc($result)) {
                if($i<6){
           ?>
                    <div class="cours">
                    <img src="img/<?php echo $row['image']; ?>"  style="width:100%"/>
                    <h3> <?php echo $row['topic']; ?> </h3>
					<h6>الفئة : <?php echo $row['dep']; ?> </h6>
					<h5> <?php echo $row['details']; ?> </h5>
						
                 <button class="bt">
                <a href="<?php echo $row['contact']; ?>">رابط فرصة العمل</a>
            </button>
                </div>
                
                <?php
                $i++;}}

             }
             else {
	                  echo "لا يوجد فرص عمل مضافة حاليا";
                   }
                   ?>
        </div>   
             <button class="btn">
             <a href="jobs.php">تصفح جميع الفرص</a>
            </button>
			</fieldset>
        </div>
        </form>
    </section>

    <?php include 'footer.php';?>

</body>
</html>
