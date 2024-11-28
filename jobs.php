<?php 

	// connect to database
	$conn = mysqli_connect("localhost", "root", "", "forasonline");
    // Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

    ?>


<?php include 'header.php';?>
 <title>الدورات المضافة</title>
 <?php include 'navbar.php';?>


    <section class="newest-courses" id="newest">
        <div class="courses-section">
         <form method="post" action="index1.php">  
         <div class="courses">

         <?php
            
             $sql = "SELECT * FROM job ORDER BY id DESC;";
             $result = mysqli_query($conn, $sql);
             
             if (mysqli_num_rows($result) > 0) 
             {
                // output data of each row
                while($row = mysqli_fetch_assoc($result)) {

           ?>
                    <div class="cours">
                    <img src="img/<?php echo $row['image']; ?>"  style="width:100%"/>
                    <h3> <?php echo $row['topic']; ?> </h3>
					<h6>المجال : <?php echo $row['dep']; ?> </h6>
					<h5> <?php echo $row['details']; ?> </h5>
						
                 <button class="bt">
                <a href="<?php echo $row['contact']; ?>">رابط فرصة العمل</a>
            </button>
                </div>
                
                <?php
                }

             }
             else {
	                  echo "لا يوجد فرصة عمل حاليا";
                   }
                   ?>
        </div>    
        </div>
    </section> 
        
	</form> 

    	     <?php include 'footer.php';?>

</body>
</html>

