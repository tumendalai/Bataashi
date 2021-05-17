<?php 
include 'connection.php';
$field_name = "lid";
if(isset($_GET['oyutnii_id'])){
    $lid = $_GET['oyutnii_id'];
    $l_info_more = $db->data_print("select *from lesson where lid = ".$lid);
}


// if (isset($_POST['submit'])){
//     if(!empty($_FILES['zurag']['name'])){
//     $zurag_ner = $_FILES['zurag']['name'];
//     $tempname = $_FILES['zurag']['tmp_name'];
//     $folder_name = "img/student/".$zurag_ner;

//     move_uploaded_file($tempname,$folder_name);

    if(isset($_POST['lid']) && isset($_POST['l_name']) && isset($_POST['l_credit'])){
                    $data = array('lid'=>mysqli_real_escape_string($db->connect,$_POST['lid']),
                    'l_name'=>mysqli_real_escape_string($db->connect,$_POST['l_name']),
                    'l_credit'=>mysqli_real_escape_string($db->connect,$_POST['l_credit']),
                   
                );
                if($db->data_update(" lesson ",$data,$field_name,$_POST['lid'])){
                   

                }
    }
else{
        if(isset($_POST['lid']) && isset($_POST['l_name']) && isset($_POST['l_credit'])){
            $data = array('lid'=>mysqli_real_escape_string($db->connect,$_POST['lid']),
            'l_name'=>mysqli_real_escape_string($db->connect,$_POST['l_name']),
            'l_credit'=>mysqli_real_escape_string($db->connect,$_POST['l_credit']),
        
        );
        if($db->data_update(" lesson ",$data,$field_name,$_POST['lid'])){
            header("location: lesson.php?updated");

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
            <span class="txt-change">Хичээлийн мэдээлэл засах</span>
        </div>
        <div class="info">
            
           <form action="s_register.php" method="post" enctype="multipart/form-data">
           <?php foreach ($l_info_more as $lmore ){ ?>
                <div class="form-group">
               
                    <div class="form-style">
                        <label for="Nmae">Хичээлийн нэр</label>
                        <input type="text" name="Name" id="Name" value="<?php echo $lmore['l_name']?>">
                    </div>
                    <div class="form-style">
                        <label for="credit">Хичээлийн Кредит</label>
                        <input type="text" name="credit" id="credit" value="<?php echo $lmore['l_credit'] ?>">
                    </div>
                    
                   
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