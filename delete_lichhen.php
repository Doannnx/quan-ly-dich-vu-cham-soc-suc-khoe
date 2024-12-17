<?php
include('dbconn.php');
if(isset($_GET['idlh'])){
    $idlh=$_GET['idlh'];
    $query="DELETE FROM `tblichhen` WHERE idlichhen=$idlh";
    $result=mysqli_query($conn,$query);
    if(!$result){
        echo "Lỗi: " . mysqli_error($connection);
    }
    else{
        header('location:viewqllh.php?d_msg=Xóa thành công');
    }

}



?>