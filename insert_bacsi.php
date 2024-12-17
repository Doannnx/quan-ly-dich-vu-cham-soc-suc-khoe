<?php
include ('dbconn.php');
isset($_POST["btnThem"]);
    //$idbs=$_POST["idbacsi"];
    $hoten=$_POST["hotenbs"];
    $gioitinh=$_POST["gioitinh"];
    $chuyenkhoa=$_POST["chuyenkhoa"];
    $sodt=$_POST["sdt"];
    $email=$_POST["email"];
    $diachi=$_POST["diachi"];

    $query= "INSERT INTO `tbbacsi`( `hotenbs`,`gioitinh` , `chuyenkhoa`, `sdt`, `email`, `diachi`) 
    VALUES ('$hoten', '$chuyenkhoa','$gioitinh','$sodt','$email','$diachi')";
    $result= mysqli_query($conn,$query);
    if(!$result){
        echo "Lỗi: " . mysqli_error($connection); 
    }
    else{
       header('location:viewqlbs.php?i_msg=Thêm thành công');
    }
    
?>