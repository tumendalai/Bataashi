<?php 

include 'connection.php';


if (isset($_POST['submit'])){

    if(isset($_POST['l_name']) && isset($_POST['l_credit'])){
        $data = array('l_name'=>mysqli_real_escape_string($db->connect,$_POST['l_name']),
                    'l_credit'=>mysqli_real_escape_string($db->connect,$_POST['l_credit']),
                );
           if($db->data_insert("lesson",$data)){
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
            <span class="txt-change">Хичээл нэмэх</span>
        </div>
        <div class="info">
            
           <form action="lessonInsert.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <div class="form-style">
                        <label for="l_name">хичээлийн нэр</label>
                        <input type="text" name="l_name" id="sid">
                    </div>
                    <div class="form-style">
                        <label for="l_credit">крэдит</label>
                        <input type="text" name="l_credit" id="fname">
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