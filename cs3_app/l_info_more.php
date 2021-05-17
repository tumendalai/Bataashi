<?php 
include 'connection.php';
$lid = $_GET['oyutnii_id'];
$l_info_more = $db->data_print("select *from lesson where lid = " .$lid);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Design</title>
</head>
<body>
    <?php include "nav.php"; ?>
    <div class="content">
        <div class="info-header">
            Хичээлийн дэлгэрэнгүй мэдэээлэл
        </div>
        <div class="info">
        <?php 
            foreach($l_info_more as $l){
                // echo "Lesson ID:" .$l['lid']."<br>";
                echo "Lesson Name:" .$l['l_name']."<br>";
                echo "Lesson Credit:" .$l['l_credit']."<br>";
                // echo "Professor:" .$l['l_']."<br>";
               
            }
        ?>
        </div>
    </div>
    <?php include "footer.php"; ?>
</body>
</html>