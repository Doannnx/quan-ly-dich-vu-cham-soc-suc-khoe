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
    if(isset($_GET['iddv'])){
        $id=$_GET['iddv'];

    

        $query= "SELECT * FROM `tbdichvu` WHERE iddv= $id";

        $result= mysqli_query($conn,$query);
        if(!$result){
            echo "k co du lieu";
            }
            else{
                $row = mysqli_fetch_assoc($result);
                print_r($row);
            } 
        }
    ?>


    <div class= container>
        <form action="update_dv.php?id_dv=value=<?php echo $row['giadv']?>" method="POST">
            <div class="form-group">
                    <label >Tên dịch vụ</label>
                    <input type="text" value=<?php echo $row ['tendv']?> class="form-control"  >
                </div>

                <div class="form-group">
                    <label>Giá dịch vụ</label>
                    <input type="text" value=<?php echo $row['giadv']?> class="form-control"   >
                </div>
                                    
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