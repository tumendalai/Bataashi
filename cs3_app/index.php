<?php 
include 'connection.php';



$student = $db->data_print("select *from student");

if(isset($_GET['oyutnii_id'])){
        if($db->dataDelete('student','sid', $_GET['oyutnii_id'])){
            header("Location:index.php?deleted");    
        }
}

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
            <a href="s_register.php">Оюутан нэмэх</a>
        </div>
        <div class="info">
            <table>
                <thead>
                    <tr>
                        <td>№</td>
                        <td>Оюутны код</td>
                        <td>Нэр</td>
                        <td>Дэлгэрэнгүй харах</td>
                        <td>Засах</td>
                        <td>Устгах</td>
                    </tr>
                </thead>
                <?php foreach ($student as $s) {?>
                <tr>
                    <td><?php echo $s['sid']?></td>
                    <td><?php echo $s['s_code']?></td>
                    <td><?php echo $s['lastname']?></td>
                    <td><a href="info_more.php?oyutnii_id=<?php echo $s['sid'] ?>">Харах</a></td>
                    <td><a href="s_edit.php?oyutnii_id=<?php echo $s['sid']; ?>">Засах</a></td>
                    <td><a href="index.php?oyutnii_id=<?php echo $s['sid']; ?>">Устгах</a></td>
                </tr>
                <?php } ?>

            </table>
        </div>
    </div>
    <?php include "footer.php"; ?>
</body>
</html>