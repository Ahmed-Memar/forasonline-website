<?php
  
if (isset($_POST['add'])) {
    $visitor_name = "";
    $visitor_email = "";
    $email_title = "";
    $visitor_message = "";
    $email_body = "<div>";
    $image = $_FILES[" "]['name'];
      
    if(isset($_POST['visitor_name'])) {
        $visitor_name = filter_var($_POST['visitor_name'], FILTER_SANITIZE_STRING);
        $email_body .= "<div>
                           <label><b>Visitor Name:</b></label>&nbsp;<span>".$visitor_name."</span>
                        </div>";
    }
 
    if(isset($_POST['visitor_email'])) {
        $visitor_email = str_replace(array("\r", "\n", "%0a", "%0d"), '', $_POST['visitor_email']);
        $visitor_email = filter_var($visitor_email, FILTER_VALIDATE_EMAIL);
        $email_body .= "<div>
                           <label><b>Visitor Email:</b></label>&nbsp;<span>".$visitor_email."</span>
                        </div>";
    }
      
    if(isset($_POST['email_title'])) {
        $email_title = filter_var($_POST['email_title'], FILTER_SANITIZE_STRING);
        $email_body .= "<div>
                           <label><b>Reason For Contacting Us:</b></label>&nbsp;<span>".$email_title."</span>
                        </div>";
    }
     
      
    if(isset($_POST['visitor_message'])) {
        $visitor_message = htmlspecialchars($_POST['visitor_message']);
        $email_body .= "<div>
                           <label><b>Visitor Message:</b></label>
                           <div>".$visitor_message."</div>
                        </div>";
    }
      

        $recipient = "ahmadmeamar7@gmail.com";
      
    $email_body .= "</div>";
 
    $headers  = 'MIME-Version: 1.0' . "\r\n"
    .'Content-type: text/html; charset=utf-8' . "\r\n"
    .'From: ' . $visitor_email . "\r\n";
      
    if(mail($recipient, $email_title, $email_body, $headers)) {
        echo "<p>Thank you for contacting us, $visitor_name. You will get a reply soon.</p>";
    } else {
        echo '<p>We are sorry but the email did not go through.</p>';
    }
      
} else {
    echo '<p>Something went wrong</p>';
}
?>



<?php include 'header.php';?>
 <title>تواصل معنا</title>
 <?php include 'navbar.php';?>

    <fieldset class="field_set">
    <legend><h3 class="topic1" >تواصل معنا</h3> </legend>
    
<p class="topic2" >أضف فرصتك وأرسل نصائحك لتطوير محتوانا</p>

<div class="container">
  <form action="contact.php" method="post" enctype="multipart/form-data" >
    <label for="name">أضف اسمك</label>
    <input type="text" id="name" name="visitor_name" placeholder="اسمك..."  required>

    <label for="email">البريد الالكتروني</label>
    <input class="mail" type="text" id="title" name="email_title" placeholder="john.doe@email.com" required/>

    <label for="title">عنوان الرسالة</label>
    <input type="text" id="title" name="email_title" required placeholder="سبب الرسالة" >

    <label for="message">أضف رسالة</label>
    <textarea class="main-input" id="message" name="visitor_message"  rows="10" cols="50" placeholder="رسالتك..." required></textarea>
     
    <label>أضف صورة</label>
    <input type="file" name="image" class="imagecon" accept=".jpg, .jpeg, .png" >
    
    <input type="submit" value="إرسال" name="add">
  </form>
</div>
</fieldset>

<?php include 'footer.php';?>

</body>
</html>

