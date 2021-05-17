<?php 

include 'connection.php';

$studentName = $db->data_print ("Select * from student");
$professorName = $db->data_print ("Select * from professor");
$lessonName = $db->data_print ("Select * from lesson");


if(isset($_POST['submit'])){
    if(isset($_POST['student']) && isset($_POST['professor']) && isset($_POST['lesson'])){
        $data = array('sid'=>mysqli_real_escape_string($db->connect,$_POST['student']),
        'pid'=>mysqli_real_escape_string($db->connect,$_POST['professor']),
        'lid'=>mysqli_real_escape_string($db->connect,$_POST['lesson'])

        );
           if($db->data_insert("hicheel_songolt",$data)){
               echo "amjilttai oruullaa";
           }
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
            <span class="txt-change">Хичээл сонголт</span>
        </div>
        <div class="info">
            
           <form action="hicheelSongoltInsert.php" method="post" enctype="multipart/form-data">
           <div class="form-group">
                <div class="form-style">
                    <label for="sid">Оюутны нэр</label>
                    <select name="student" id="">
                        <?php foreach ($studentName as $s ){ ?>
                            <option value="<?php echo $s['sid'];?>"><?php echo $s['lastname'];?></option>
                        <?php }?>
                    </select>
                </div>
                <div class="form-style">
                    <label for="sid">Багшийн нэр</label>
                    <select name="professor" id="">
                        <?php foreach ($professorName as $p ){ ?>
                            <option value="<?php echo $p['pid'];?>"><?php echo $p['p_name'];?></option>
                        <?php }?>
                    </select>
                </div>
                <div class="form-style">
                    <label for="sid">Хичээлийн нэр</label>
                    <select name="lesson" id="">
                        <?php foreach ($lessonName as $l ){ ?>
                            <option value="<?php echo $l['lid'];?>"><?php echo $l['l_name'];?></option>
                        <?php }?>
                    </select>
                </div>
                <div class="form-style">
                        <label for=""></label>
                        <input type="submit" name="submit">

                    </div>
            </div>
           </form>
        </div>
    </div>
    <?php include "footer.php"; ?>
</body>
</html>