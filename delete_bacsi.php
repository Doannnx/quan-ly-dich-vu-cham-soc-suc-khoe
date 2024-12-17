<?php
include('dbconn.php');
if(isset($_GET['idbacsi'])){
    $idbs=$_GET['idbacsi'];
    $query="DELETE from tbbacsi WHERE idbacsi = '$idbs'";
    $result=mysqli_query($conn,$query);
    if(!$result){
        echo "Lỗi: " . mysqli_error($connection);
    }
    else{
        header('location:viewqlbs.php?d_msg=Xóa thành công');
    }

}



?>