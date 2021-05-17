<?php include 'connection.php';
$hicheelSongolt = $db->data_print("select hs.hsid, s.s_code, p.p_name, l.l_name from hicheel_songolt hs inner join student s on s.sid=hs.sid inner join professor p on p.pid = hs.pid inner join lesson l on l.lid=hs.lid");

if(isset($_GET['hsid'])){
    if($db->dataDelete('hicheel_songolt','hsid',$_GET['hsid'])){
        header("Location:hicheelSongolt.php?deleted");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Design</title>
</head>
<body>
    <?php include 'nav.php'; ?>
   
    <div class="content">
        <div class="info-header">
            <span class="txt-change">Хичээл сонголт</span>
            <a href="hicheelSongoltInsert.php">Хичээл сонголт хийх</a>
        </div>
        <div class="info">
            <table>
                <thead>
                    <tr>
                        <td>№</td>
                        <td>Оюутны код</td>
                        <td>Багшийн Нэр</td>
                        <td>Хичээлийн Нэр</td>
                        
                        <td>Устгах</td>
                    </tr>
                </thead>
                <?php foreach($hicheelSongolt as $h) { ?>
                <tr>
                    <td><?php echo $h['hsid']; ?></td>
                    <td><?php echo $h['s_code']; ?></td>
                    <td><?php echo $h['p_name']; ?></td>
                    <td><?php echo $h['l_name']; ?></td>
                    
                    <td><a href="hicheelsongolt.php?hsid=<?php echo $h['hsid'];?>">Устгах</a></td>
                    
                </tr>
                <?php } ?>
            </table>
        </div>

    </div>
    <?php include 'footer.php' ?>

</body>

</html>