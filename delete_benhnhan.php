<?php
include('dbconn.php');
if(isset($_GET['idbenhnhan'])){
    $idbn=$_GET['idbenhnhan'];
    $query="DELETE from tbbenhnhan WHERE idbenhnhan = '$idbn'";
    $result=mysqli_query($conn,$query);
    if(!$result){
        echo "Lỗi: " . mysqli_error($connection);
    }
    else{
        header('location:index.php?d_msg=Xóa thành công');
    }

}



?>