<?php include 'config/database.php';
$db = new Database(); 


if (isset($_POST['submit']) && isset($_FILES['zurag']['name'])){
    $zurag_ner = $_FILES['zurag']['name'];
    $tempname = $_FILES['zurag']['tmp_name'];
    $folder_name = "img/student/".$zurag_ner;

    move_uploaded_file($tempname,$folder_name);

    if(isset($_POST['s_code']) && isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['ognoo'])&& isset($_POST['sex']) && isset($zurag_ner)){
        $data = array('s_code'=>mysqli_real_escape_string($db->connect,$_POST['s_code']),
                    'firstname'=>mysqli_real_escape_string($db->connect,$_POST['fname']),
                    'lastname'=>mysqli_real_escape_string($db->connect,$_POST['lname']),
                    'sex'=>mysqli_real_escape_string($db->connect,$_POST['sex']),
                    'birthday'=>mysqli_real_escape_string($db->connect,$_POST['ognoo']),
                    'zurag'=>mysqli_real_escape_string($db->connect,$folder_name),
                );
           if($db->data_insert("student",$data)){
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
            <span class="txt-change">Оюутан нэмэх</span>
        </div>
        <div class="info">
           <form action="s_register.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <div class="form-style">
                        <label for="sid">Оюутны код</label>
                        <input type="text" name="s_code" id="sid">
                    </div>
                    <div class="form-style">
                        <label for="fname">Овог</label>
                        <input type="text" name="fname" id="fname">
                    </div>
                    <div class="form-style">
                        <label for="lname">Нэр</label>
                        <input type="text" name="lname" id="lname">
                    </div>
                    <div class="form-style">
                        <label for="ognoo">Төрсөн огноо</label>
                        <input type="text" name="ognoo" id="ognoo" value="<?php echo date('Y-m-d') ?>">
                    </div>
                    <div class="form-style">
                        <label for="sex">Хүйс</label>
                        <input type="radio" name="sex"  value="Эрэгтэй"> Эрэгтэй
                        <input type="radio" name="sex"  value="Эмэгтэй"> Эмэгтэй
                    </div>
                    <div class="form-style">
                        <label for="zurag">Зураг</label>
                        <input type="file" name="zurag" id="zurag">
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
