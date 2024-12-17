<?php
include('dbconn.php');
if(isset($_GET['iddv'])){
    $iddv=$_GET['iddv'];
    $query="DELETE from tbdichvu WHERE iddv = '$iddv'";
    $result=mysqli_query($conn,$query);
    if(!$result){
        echo "Lỗi: " . mysqli_error($connection);
    }
    else{
        header('location:viewqldv.php?d_msg=Xóa thành công');
    }

}



?>