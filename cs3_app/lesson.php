<?php

include 'connection.php';


$lesson = $db->data_print("select *from lesson");
if(isset($_GET['oyutnii_id'])){
    if($db->dataDelete('lesson','lid',$_GET['lid'])){
        header('Location:index.php?deleted');
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lesson</title>
</head>
<body>
    <?php include "nav.php"; ?>
    <div class="content">
        <div class="info-header">
            <a href="lessonInsert.php">Хичээл нэмэх</a>
        </div>
        <div class="info">
            <table>
                <thead>
                    <tr>
                        <td>№</td>
                        <td>Хичээлийн нэр</td>
                        <td>Кредит</td>
                        <td>Дэлгэрэнгүй харах</td>
                        <td>Засах</td>
                        <td>Устгах</td>
                    </tr>
                </thead>
                <?php foreach ($lesson as $l) {?>
                <tr>
                    <td><?php echo $l['lid']?></td>
                    <td><?php echo $l['l_name']?></td>
                    <td><?php echo $l['l_credit']?></td>
                    <td><a href="l_info_more.php?oyutnii_id=<?php echo $l['lid']?>">Харах</a></td>
                    <td><a href="l_edit.php?oyutnii_id=<?php echo $l['lid'];?>">Засах</a></td>
                    <td><a href="lesson.php?lid=<?php echo $l['lid'];?>">Устгах</a></td>
                </tr>
                <?php } ?>
            </table>
        </div>
    </div>
    <?php include "footer.php"; ?>
</body>
</html>