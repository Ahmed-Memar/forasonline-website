<?php 

	// connect to database
	$conn = mysqli_connect("localhost", "root", "", "forasonline");
    // Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

    ?>


<?php include 'header.php';?>
 <title>المنح المضافة</title>
 <?php include 'navbar.php';?>

     <!-- What's New Section -->

    <section class="newest-courses" id="newest">
        <div class="courses-section">
         <form method="post" action="">  
         <div class="courses">

         <?php
            
             $sql = "SELECT * FROM scholarship ORDER BY id DESC;";
             $result = mysqli_query($conn, $sql);
             
             if (mysqli_num_rows($result) > 0) 
             {
                // output data of each row
                while($row = mysqli_fetch_assoc($result)) {

           ?>
                    <div class="cours">
                    <img src="img/<?php echo $row['image']; ?>"  style="width:100%"/>
                    <h3> <?php echo $row['topic']; ?> </h3>
					<h6>المستوى : <?php echo $row['dep']; ?> </h6>
					<h5> <?php echo $row['details']; ?> </h5>
						
                 <button class="bt">
                <a href="<?php echo $row['contact']; ?>">رابط المنحة</a>
            </button>
                </div>
                
                <?php
                }

             }
             else {
	                  echo "لا يوجد منح";
                   }
                   ?>
        </div>    
        </div>
    </section> 
        
	</form> 

    	     <?php include 'footer.php';?>

</body>
</html>

