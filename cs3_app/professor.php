<?php

include 'connection.php';


$professor = $db->data_print("select *from professor");
if(isset($_GET['oyutnii_id'])){
    if($db->dataDelete('professor','pid',$_GET['pid'])){
        header('Location:professor.php?deleted');
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
            <a href="p_register.php">Багш нэмэх</a>
        </div>
        <div class="info">
            <table>
                <thead>
                    <tr>
                        <td>№</td>
                        <td>Багшийн нэр</td>
                        <td>Утас</td>
                        <td>Дэлгэрэнгүй харах</td>
                        <td>Засах</td>
                        <td>Устгах</td>
                    </tr>
                </thead>
                <?php foreach ($professor as $p) {?>
                <tr>
                    <td><?php echo $p['pid']?></td>
                    <td><?php echo $p['p_name']?></td>
                    <td><?php echo $p['p_phone']?></td>
                    <td><a href="p_info_more.php?oyutnii_id=<?php echo $p['pid']?>">Харах</a></td>
                    <td><a href="p_edit.php?oyutnii_id=<?php echo $p['pid'];?>">Засах</a></td>
                    <td><a href="professor.php?pid=<?php echo $p['pid'];?>">Устгах</a></td>
                </tr>
                <?php } ?>

            </table>
        </div>
    </div>
    <?php include "footer.php"; ?>
</body>
</html>