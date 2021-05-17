<?php 

include 'connection.php';


// if (isset($_POST['submit']) && isset($_FILES['zurag']['name'])){
//     $zurag_ner = $_FILES['zurag']['name'];
//     $tempname = $_FILES['zurag']['tmp_name'];
//     $folder_name = "img/student/".$zurag_ner;

//     move_uploaded_file($tempname,$folder_name);}

    if(isset($_POST['pid']) && isset($_POST['name']) && isset($_POST['lname']) && isset($_POST['lesson']) && isset($_POST['phone']) ){
        $data = array('pid'=>mysqli_real_escape_string($db->connect,$_POST['pid']),
                    'p_name'=>mysqli_real_escape_string($db->connect,$_POST['name']),
                    'p_lname'=>mysqli_real_escape_string($db->connect,$_POST['lname']),
                    'p_lesson'=>mysqli_real_escape_string($db->connect,$_POST['lesson']),
                    'p_phone'=>mysqli_real_escape_string($db->connect,$_POST['phone']),
                    // 'zurag'=>mysqli_real_escape_string($db->connect,$folder_name),
                );
           if($db->data_insert("professor",$data)){
               echo "amjilttai oruullaa";
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
           
                <div class="form-group">
                <div class="form-style">
                        <label for="name">Овог</label>
                        <input type="text" name="name" id="name" >
                    </div>
                    <div class="form-style">
                        <label for="lname">Нэр</label>
                        <input type="text" name="lname" id="lname">
                    </div>
                    <div class="form-style">
                        <label for="lesson">Хичээлийн нэр</label>
                        <input type="text" name="lesson" id="lesson">
                    </div>
                    <div class="form-style">
                        <label for="phone">Утасны дугаар</label>
                        <input type="text" name="phone" id="phone" >
                    </div>
                    <!-- <div class="form-style">
                        <label for="sex">Хүйс</label>
                        <input type="radio" name="sex"  value="Эрэгтэй" > Эрэгтэй
                        <input type="radio" name="sex"  value="Эмэгтэй" > Эмэгтэй
                    </div>
                    <div class="form-style">
                        <label for="zurag">Зураг</label>
                        <input type="file" name="zurag" id="zurag">
                    </div> -->
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