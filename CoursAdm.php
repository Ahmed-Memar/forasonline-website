<?php

include_once("dbConnect.php");

// Fetch all courses data from database
$result = mysqli_query($mysqli, "SELECT * FROM courses ORDER BY id DESC");
?>

<?php include 'header.php';?>
 <title>admin cours</title>

 <style>
table {
  border-collapse: collapse;
  width: 95%;
  margin-right: 20px;
  margin-left: 15px;

}

th, td {
  text-align: right;
  padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}

th {
  background-color: #6e0aef;
  color: white;
}

.btnadd {
    width: 15rem;
    margin-top: 3rem;
    margin-bottom: 3rem;
    margin-right: 3rem;
    border-radius: 0.5rem;
    padding: 0.75rem 1.5rem;
    background-color: #6e0aef;
    text-align: center;
    outline: none;
    border: none;
}


    .btnadd:hover {
        background-color: #7d22f3;
        cursor: pointer;
    }

    .btnadd a {
        text-decoration: none;
        color: #ffffff;
        font-size: 1.4rem;
    }

.btnedit {
    width: 7rem;
    margin-top: 3rem;
    border-radius: 0.5rem;
    padding: 0.75rem 1.5rem;
    background-color: #6e0aef;
    text-align: center;
    outline: none;
    border: none;
}


    .btnedit:hover {
        background-color: #7d22f3;
        cursor: pointer;
    }

    .btnedit a {
        text-decoration: none;
        color: #ffffff;
        font-size: 1.4rem;
    }

    .btndel {
    width: 7rem;
    margin-top: 3rem;
    border-radius: 0.5rem;
    padding: 0.75rem 1.5rem;
    background-color: red;
    text-align: center;
    outline: none;
    border: none;
}


    .btndel:hover {
        background-color: #FF4500;
        cursor: pointer;
    }

    .btndel a {
        text-decoration: none;
        color: #ffffff;
        font-size: 1.4rem;
    }
</style>
 <?php include 'navbar.php';?>
<table>

    <tr>
        <th>قسم</th> <th>عنوان</th> <th>تفاصيل</th> <th>رابط</th> <th>الصورة</th> <th>خيارات</th>
    </tr>
    <?php  

    if (mysqli_num_rows($result) > 0) 
             { 
                // output data of each row
                while($row = mysqli_fetch_assoc($result)) {
        
        echo "<tr>";
        echo "<td>".$row['dep']."</td>";
        echo "<td>".$row['topic']."</td>";
        echo "<td>".$row['details']."</td>";  
        echo "<td>".$row['contact']."</td>";?>
       <td> <?php echo '<img src="img/'.$row['image'].'" width="100px;" height="100px;" alt="Image">'?> </td>;
       <?php echo "<td><button class='btnedit'><a href='CoursAdm-Edit.php?id=$row[id]'> تعديل </a></button>&nbsp;<button class='btndel'><a href='CoursAdm-Del.php?id=$row[id]'> حذف </a></button></td></tr>";
              
    }
             }
             else {
	                  echo "لا يوجد كورسات حاليا";
                   }
    ?>
    </table>
<?php include 'footer.php';?>

</body>
</html>
