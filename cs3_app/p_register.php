
<?php 

include 'connection.php';


if (isset($_POST['submit'])){
    if(isset($_POST['p_name']) && isset($_POST['p_phone'])){
        $data = array('p_name'=>mysqli_real_escape_string($db->connect,$_POST['p_name']),
                    'p_phone'=>mysqli_real_escape_string($db->connect,$_POST['p_phone']),
                );
           if($db->data_insert("professor",$data)){
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
            <span class="txt-change">Багш нэмэх</span>
        </div>
        <div class="info">
            
           <form action="professorInsert.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <div class="form-style">
                        <label for="p_name">Нэр</label>
                        <input type="text" name="p_name" id="sid">
                    </div>
                    <div class="form-style">
                        <label for="P_phone">Утас</label>
                        <input type="text" name="p_phone" id="fname">
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