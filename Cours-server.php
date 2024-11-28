<?php 	
	session_start();


	// connect to database
	$db = mysqli_connect("localhost", "root", "", "forasonline");



	// REGISTER USER
	if (isset($_POST['add'])) {
         
		// receive all input values from the form
        $dep = mysqli_real_escape_string($db, $_POST['dep']);
		$topic = mysqli_real_escape_string($db, $_POST['topic']);
		$details = mysqli_real_escape_string($db, $_POST['details']);
		$contact = mysqli_real_escape_string($db, $_POST['contact']);

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


        $query = "INSERT INTO courses(dep,topic,details,contact,image) 
					  VALUES('$dep','$topic','$details','$contact','$newImageName')";
           
			mysqli_query($db, $query);
          

         
            $dep="";
            $topic="";
			$details="";
			$contact="";
			$image="";



	}
                                

?>