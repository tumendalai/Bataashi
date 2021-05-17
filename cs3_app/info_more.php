<?php 
include 'connection.php';
 $sid = $_GET['oyutnii_id'];
 $student_more = $db->data_print("select *from student where sid = ".$sid);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <title>Design</title>
</head>


<body>
    
    <?php include 'nav.php';?>
    <div class="content">
            <div class="info-header">
               оюутаны дэлгэрэнгүй мэдээлэл
            </div>
            <div class="info">
            <?php
             foreach($student_more as $sm){
                echo "Fname:".$sm['firstname']."<br>";
                echo "Lname:".$sm['lastname']."<br>";
                echo "Sex:".$sm['sex']."<br>";
                echo "Student code:".$sm['s_code']."<br>";


             }


            ?>
            </div>
    </div>

   
<?php include 'footer.php';?>
</body>
</html>

