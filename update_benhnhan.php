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
    if(isset($_GET['idbenhnhan'])){
        $id=$_GET['idbenhnhan'];

    

        $sql= "SELECT * FROM `tbbenhnhan` WHERE idbenhnhan= $id";

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
            if(isset($_GET['id_bn'])){
                $idbn= $_GET['id_bn'];
            }

            
            $hoten=$_POST["hoten"];
            $ngaysinh=$_POST["ngaysinh"];
            $gioitinh=$_POST["gioitinh"];
            $sodt=$_POST["sodt"];
            $email=$_POST["email"];
            $diachi=$_POST["diachi"];

            // Sửa dữ liệu 
            $sql = "UPDATE `tbbenhnhan` SET `hoten`='$hoten',`ngaysinh`='$ngaysinh',`gioitinh`='$gioitinh',`sodt`='$sodt',`email`='$email',`diachi`='$diachi' WHERE `idbenhnhan`='$idbn'";

            if ($conn->query($sql) === TRUE) {
                header('location:index.php?u_msg=Sửa thành công');
            } else {
                echo "Lỗi: " . $sql . "<br>" . $conn->error;
            }
        
        }

        ?>


    <div class= container>
    <form action="update_benhnhan.php?id_bn=<?php echo $id;?>" method="POST">
        <div class="form-group">
                    <label >Họ tên</label>
                    <input type="text" class="form-control" value=<?php echo $row ['hoten']?> id="hoten" name ="hoten" >
                </div>
                <div class="form-group">
                    <label >Ngày sinh</label>
                    <input type="text" class="form-control" value=<?php echo $row['ngaysinh']?> id="ngaysinh" name ="ngaysinh" >
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
                    <label >Số điện thoại</label>
                    <input type="text" class="form-control" value=<?php echo $row['sodt']?> id="sodt" name ="sodt" >
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