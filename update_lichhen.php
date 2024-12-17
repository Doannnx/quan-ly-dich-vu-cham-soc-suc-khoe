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
    if(isset($_GET['idlh'])){
        $id=$_GET['idlh'];

    

        $sql= "SELECT * FROM `tblichhen` WHERE iddv= $id";

        $result= $conn->query($sql);
        if($result->num_rows==0){
        echo "k co du lieu";
    }
            /*else{
                $row = mysqli_fetch_array($result);
                print_r($row);
            } */
        }
    ?>


    <div class= container>
        <form action="update_lichhen.php?id_lh=value=<?php echo $row['idlichhen']?>" method="POST">
            <div class="form-group">
           <?php
           while($row = $result->fetch_assoc()){
            ?>
            <label >Họ Tên</label>
                    <input type="text" value=<?php echo $row ['hoten']?> class="form-control"  >
                </div>

                <div class="form-group">
                    <label>Số điện thoại</label>
                    <input type="text" value=<?php echo $row['sodt']?> class="form-control"   >
                </div>
            <?php
        } 
           ?> 
                    
                                    
            <button type="submit" class="btn btn-success" name="btnThem">Sửa</button>
        </form>

    </div>


            <?php   

        if (isset($_POST['btnThem'])) {

            if(isset($_GET['id_dv'])){
                $iddv= $_GET['id_dv'];
            }

            
            $tendv=$_POST["tendv"];
            $giadv=$_POST["giadv"];
            

            // Sửa dữ liệu 
            $sql = "UPDATE `tbdichvu` SET`tendv`='$tendv',`giadv`='$giadv' WHERE `iddv`='$iddv'";

            if ($conn->query($sql) === TRUE) {
                header('location:viewqldv.php?u_msg=Sửa thành công');
            } else {
                echo "Lỗi: " . $sql . "<br>" . $conn->error;
            }
        
        }

        ?>




</body>