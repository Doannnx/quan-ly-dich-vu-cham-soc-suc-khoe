<?php
include ('dbconn.php');
isset($_POST["btnThem"]);
    //$iddv=$_POST["iddv"];
    $tendv=$_POST["tendv"];
    $giadv=$_POST["giadv"];


    $query= "INSERT INTO `tbdichvu`(`tendv`, `giadv`) VALUES ('$tendv','$giadv')";
    $result= mysqli_query($conn,$query);
    if(!$result){
        echo "Lỗi: " . mysqli_error($connection); 
    }
    else{
       header('location:viewqldv.php?i_msg=Thêm thành công');
    }
    
?>