<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
    
    <?php //bat id
    include('dbconn.php');
    if(isset($_GET['idbacsi'])){
        $id=$_GET['idbacsi'];

    

        $sql= "SELECT * FROM `tbbacsi` WHERE idbacsi= $id";

    $result= $conn->query($sql);
        if($result->num_rows==0){
            echo "k co du lieu";
            }
            else{
                $row = $result->fetch_assoc();
            } 
        }
    ?>

        <?php   

        if (isset($_POST['btnThem'])) {

            if(isset($_GET['id_bs'])){
                $idbs= $_GET['id_bs'];
            }

            
            $hoten=$_POST["hotenbs"];
            $chuyenkhoa=$_POST["chuyenkhoa"];
            $gioitinh=$_POST["gioitinh"];
            $sdt=$_POST["sdt"];
            $email=$_POST["email"];
            $diachi=$_POST["diachi"];

            // Sửa dữ liệu 
            $sql = "UPDATE `tbbacsi` SET `hotenbs`='$hoten',`gioitinh`='$gioitinh',`chuyenkhoa`='$chuyenkhoa',`sdt`='$sdt',`email`='$email',`diachi`='$diachi' WHERE `idbacsi`='$idbs'";

            if ($conn->query($sql) === TRUE) {
                header('location:viewqlbs.php?bsu_msg=Sửa thành công');
            } else {
                echo "Lỗi: " . $sql . "<br>" . $conn->error;
            }
        
        }

        ?>


    <div class= container>
    <form action="update_bacsi.php?id_bs=<?php echo $id;?>" method="POST">
        <div class="form-group">
                    <label >Họ tên</label>
                    <input type="text" class="form-control" value=<?php echo $row ['hotenbs']?> id="hotenbs" name ="hotenbs" >
                </div>


                <fieldset class="row mb-3">
                <legend class="col-form-label col-sm-4 pt-0">Giới tính</legend>
                <div class="col-sm-10">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gioitinh" id="gioitinh" value="Nam" checked>
                    <label class="form-check-label" for="gioitinh">
                    Nam
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gioitinh" id="gioitinh" value="Nữ">
                    <label class="form-check-label" for="gioitinh">
                    Nữ
                    </label>
                </div>
                    </fieldset>


                <div class="form-group">
                    <label >Chuyên khoa</label>
                    <input type="text" class="form-control" value=<?php echo $row['chuyenkhoa']?> id="chuyenkhoa" name ="chuyenkhoa" >
                </div>
                
                <div class="form-group">
                    <label >Số điện thoại</label>
                    <input type="text" class="form-control" value=<?php echo $row['sdt']?> id="sdt" name ="sdt" >
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" value=<?php echo $row['email']?> id="email" name ="email" >
                </div>
                <div class="form-group">
                    <label>Địa chỉ</label>
                    <input type="text" class="form-control" value=<?php echo $row['diachi']?> id="diachi" name ="diachi" >
                </div>
                                    
            <button type="submit" class="btn btn-success" name="btnThem">Sửa</button>
        </form>

    </div>




</body>