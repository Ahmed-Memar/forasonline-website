<?php
include_once("dbConnect.php");
?>

<?php include 'header.php';?>
 <title>الدورات المضافة</title>
 <?php include 'navbar.php';?>

    <section class="newest-courses" id="newest">
        <div class="courses-section">
         <form method="post" action="index1.php">  
         <div class="courses">

         <?php
            
             $sql = "SELECT * FROM courses ORDER BY id DESC;";
             $result = mysqli_query($mysqli, $sql);
             
             if (mysqli_num_rows($result) > 0) 
             {
                // output data of each row
                while($row = mysqli_fetch_assoc($result)) {

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
                }
             }
             else {
	                  echo "no cours found";
                   }
                   ?>
        </div>    
        </div>
    </section> 
        
	</form> 

    	     <?php include 'footer.php';?>

</body>
</html>

