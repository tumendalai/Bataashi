<?php 
include 'connection.php';
 $field_name = "sid";
 if(isset($_GET['oyutnii_id'])){
    $sid = $_GET['oyutnii_id'];
    $student_more = $db->data_print("select *from student where sid = ".$sid);
  
 }



 if(isset($_POST['submit']) ){
if(!empty($_FILES['zurag']['name'])){
    $zurag_ner = $_FILES['zurag']['name'];
    $tempname = $_FILES['zurag']['tmp_name'];
    $folder_name = "img/student/".$zurag_ner;
    move_uploaded_file($tempname,$folder_name);
    if(isset($_POST['s_code']) && isset( $_POST['fname']) && isset($_POST['lname']) && isset($_POST['ognoo']) && isset($_POST['sex']) && isset($_POST['sid']) ){
            $data = array('s_code'=>mysqli_real_escape_string($db->connect,$_POST['s_code']), 
                             'firstname'=>mysqli_real_escape_string($db->connect,$_POST['fname']),
                             'lastname'=>mysqli_real_escape_string($db->connect,$_POST['lname']),
                             'sex'=>mysqli_real_escape_string($db->connect,$_POST['sex']),
                             'birthday'=>mysqli_real_escape_string($db->connect,$_POST['ognoo']),
                             'zurag'=>mysqli_real_escape_string($db->connect, $folder_name),
                            );   
                          //  echo print_r($data);
                         if($db->data_update("student",$data,$field_name,$_POST['sid'])){
                           header("location:index.php?updated");
                           
                         }
                           
    }
}else{
    if(isset($_POST['s_code']) && isset( $_POST['fname']) && isset($_POST['lname']) && isset($_POST['ognoo']) && isset($_POST['sex']) && isset($_POST['image']) && isset($_POST['sid']) ){
        $data = array('s_code'=>mysqli_real_escape_string($db->connect,$_POST['s_code']), 
                         'firstname'=>mysqli_real_escape_string($db->connect,$_POST['fname']),
                         'lastname'=>mysqli_real_escape_string($db->connect,$_POST['lname']),
                         'sex'=>mysqli_real_escape_string($db->connect,$_POST['sex']),
                         'birthday'=>mysqli_real_escape_string($db->connect,$_POST['ognoo']),
                         'zurag'=>mysqli_real_escape_string($db->connect, $_POST['image']),
                        );   
                    
                      if($db->data_update("student",$data,$field_name,$_POST['sid'])){
                        header("location:index.php?updated");
                    }
                       
}
}
}


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
<?php  include 'nav.php'; ?>
    <div class="content">
        <div class="info-header">
            <span class="txt-change">Оюутан нэмэх</span>
        </div>
        <div class="info">
            <form action="s_edit.php" method="post" enctype="multipart/form-data">
<?php  foreach( $student_more as $smore ){?>
                <div class="form-group">
                    <div class="form-style">
                        <label for="sid">Оюутны код</label>
                        <input type="text" name="s_code" id="sid" value="<?php echo $smore['s_code'];?>">
                    </div>
                    <div class="form-style">
                        <label for="fname">Овог</label>
                        <input type="text" name="fname" id="fname" value="<?php echo $smore['firstname'];?>">
                    </div>
                    <div class="form-style">
                        <label for="lname">Нэр</label>
                        <input type="text" name="lname" id="lname" value="<?php echo $smore['lastname'];?>">
                    </div>
                    <div class="form-style">
                        <label for="ognoo">Төрсөн огноо</label>
                        <input type="text" name="ognoo" id="ognoo" value="<?php echo $smore['birthday']; ?>"  >
                    </div> 
                    <div class="form-style">
                        <label for="sex">Хүйс</label>
                        <input type="radio" name="sex" value="Эрэгтэй"  <?php  if($smore['sex']=="Эрэгтэй"){ echo "checked"; } ?> >Эрэгтэй
                        <input type="radio" name="sex"  value="Эмэгтэй" <?php  if($smore['sex']=="Эмэгтэй"){ echo "checked"; } ?>>Эмэгтэй
                    </div> 
                    <div class="form-style">
                        <label for="zurag">Зураг</label>
                        <img src="<?php  echo $smore['zurag']; ?>" width="50px" height="100px">
                        <input type="hidden" name="image" value="<?php  echo $smore['zurag']; ?>" >
                        <input type="hidden" name="sid" value="<?php  echo $sid; ?>" >
                        <input type="file" name="zurag" id="zurag" >
                    </div> 
                    <div class="form-style">
                        <label for=""></label>
                        <input type="submit" name="submit">
                    </div>
                </div>
<?php } ?>
            </form>
        </div>
    </div>
    <?php  include 'footer.php'; ?>
</body>

</html>