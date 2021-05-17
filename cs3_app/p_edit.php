<?php 
include 'connection.php';
$field_name = "pid";
if(isset($_GET['oyutnii_id'])){
    $pid = $_GET['oyutnii_id'];
    $p_info_more = $db->data_print("select *from professor where pid = ".$pid);
}


// if (isset($_POST['submit'])){
//     if(!empty($_FILES['zurag']['name'])){
//     $zurag_ner = $_FILES['zurag']['name'];
//     $tempname = $_FILES['zurag']['tmp_name'];
//     $folder_name = "img/student/".$zurag_ner;

//     move_uploaded_file($tempname,$folder_name);

    if(isset($_POST['pid']) && isset($_POST['p_fname']) && isset($_POST['p_lname']) && isset($_POST['p_lesson'])&& isset($_POST['p_phone'])){
                    $data = array('pid'=>mysqli_real_escape_string($db->connect,$_POST['pid']),
                    'p_name'=>mysqli_real_escape_string($db->connect,$_POST['name']),
                    'p_lname'=>mysqli_real_escape_string($db->connect,$_POST['lname']),
                    'p_lesson'=>mysqli_real_escape_string($db->connect,$_POST['lesson']),
                    'p_phone'=>mysqli_real_escape_string($db->connect,$_POST['phone']),
                    // 'zurag'=>mysqli_real_escape_string($db->connect,$folder_name),
                );
                if($db->data_update(" professor ",$data,$field_name,$_POST['pid'])){
                   

                }
    }
else{
    if(isset($_POST['pid']) && isset($_POST['p_fname']) && isset($_POST['p_lname']) && isset($_POST['p_lesson'])&& isset($_POST['p_phone'])){
                $data = array('pid'=>mysqli_real_escape_string($db->connect,$_POST['pid']),
                'p_name'=>mysqli_real_escape_string($db->connect,$_POST['name']),
                'p_lname'=>mysqli_real_escape_string($db->connect,$_POST['lname']),
                'p_lesson'=>mysqli_real_escape_string($db->connect,$_POST['lesson']),
                'p_phone'=>mysqli_real_escape_string($db->connect,$_POST['phone']),
                // 'zurag'=>mysqli_real_escape_string($db->connect,$folder_name),
            );
           if($db->data_update("professor",$data,$field_name,$_POST['pid'])){
            header("location: index.php?updated");
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
            <span class="txt-change">Багшийн мэдээлэл засах</span>
        </div>
        <div class="info">
            
           <form action="p_register.php" method="post" enctype="multipart/form-data">
           <?php foreach ($p_info_more as $pmore ){ ?>
                <div class="form-group">
                <div class="form-style">
                        <label for="name">Овог</label>
                        <input type="text" name="fname" id="name" value="<?php echo $pmore['p_name']?>">
                    </div>
                    <div class="form-style">
                        <label for="lname">Нэр</label>
                        <input type="text" name="lname" id="lname" value="<?php echo $pmore['p_lname']?>">
                    </div>
                    <div class="form-style">
                        <label for="lesson">Хичээлийн нэр</label>
                        <input type="text" name="lesson" id="lesson" value="<?php echo $pmore['p_lesson']?>">
                    </div>
                    <div class="form-style">
                        <label for="number">Утасны дугаар</label>
                        <input type="text" name="number" id="number" value="<?php echo $pmore['p_phone'] ?>">
                    </div>
                    
                    <!-- <div class="form-style">
                        <label for="zurag">Зураг</label>
                        <img src="<?php echo $pmore['zurag'];?>" width="50px" height="100px">
                        <input type="hidden" name="imgage" value="<?php echo $pmore['zurag'];?>">
                        <input type="hidden" name="pid" value="<?php echo $pid;?>">
                        <input type="file" name="zurag" id="zurag">
                    </div> -->
                    <div class="form-style">
                        <label for=""></label>
                        <input type="submit" name="submit">

                    </div>
                </div>
                <?php }?>
           </form>
        </div>
    </div>
    <?php include "footer.php"; ?>
</body>
</html>