<?php
include ('dbconn.php');
isset($_POST["btnThem"]);
    $idbn=$_POST["idbenhnhan"];
    $hoten=$_POST["hoten"];
    $ngaysinh=$_POST["ngaysinh"];
    $gioitinh=$_POST["gioitinh"];
    $sodt=$_POST["sodt"];
    $email=$_POST["email"];
    $diachi=$_POST["diachi"];

    $query= "INSERT INTO `tbbenhnhan`(`idbenhnhan`, `hoten`, `ngaysinh`, `gioitinh`, `sodt`, `email`, `diachi`) 
    VALUES ('$idbn', '$hoten','$ngaysinh', '$gioitinh','$sodt','$email','$diachi')";
    $result= mysqli_query($conn,$query);
    if(!$result){
        echo "Lỗi: " . mysqli_error($connection); 
    }
    else{
       header('location:index.php?i_msg=Thêm thành công');
    }
    
?>