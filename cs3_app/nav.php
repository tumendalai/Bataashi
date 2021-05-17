
<ul>
<li>Welcome:
<?php
if($_SESSION['uname']){
    echo $_SESSION['uname'];
}else{
    header("Location:login.php");
}
?>
</li>
        <li><a class="active"href="index.php">Student</a></li>
        <li><a href="professor.php">Professor</a></li>
        <li><a href="lesson.php">Lesson</a></li>
        <li><a href="hicheelSongolt.php">хичээл сонголт</a></li>
        <li><a href="logout.php">гарах</a></li>
        
    </ul>