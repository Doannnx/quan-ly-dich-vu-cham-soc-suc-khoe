<?php include('dbconn.php') ?>
<?php include('header.php') ?>
<?php
                    if (isset($_POST['btnThem'])) {
                        $idlh=$_POST["idlichhen"];
                        //$idbn=$_POST["idbenhnhan"];
                        $hoten=$_POST["hoten"];
                        $sodt=$_POST["sodt"];
                        $ngayhen=$_POST["ngayhen"];
                        $thoigian=$_POST["thoigian"];
                        $tendv=$_POST["tendv"];
                        $trangthai=$_POST["trangthai"];



                        $query= "INSERT INTO `tblichhen`(`idlichhen`, `hoten`, `sodt`, `ngayhen`, `thoigian`, `tendv`, `trangthai`) 
                        VALUES ('$idlh','$hoten','$sodt','$ngayhen','$thoigian','$tendv','$trangthai')";
                        $result= mysqli_query($conn,$query);
                        if(!$result){
                            echo "Lỗi: " . mysqli_error($connection); 
                        }
                        else{
                        header('location:viewqllh.php?i_msg=Thêm thành công');
                        }

                    }
                        
                        
?>
<form action="insert_lichhen.php" method="POST">
            
    
                <div class="form-group">

                            <label >Họ tên</label>
                            <input type="text" class="form-control" id="hoten" name ="hoten">
                        </div>
                        <div class="form-group">
                            <label >Số điện thoại</label>
                            <input type="text" class="form-control" id="sodt" name ="sodt">
                        </div>
                        <div class="form-group">
                            <label >Ngày hẹn</label>
                            <input type="date" class="form-control" id="ngayhen" name ="ngayhen">
                        </div>
                        <div class="form-group">
                            <label >Thời gian</label>
                            <input type="time" class="form-control" id="thoigian" name ="thoigian">
                        </div>
                        <select name="tendv" class="form-control">
                            <label >Chọn dịch vụ </label>
                            
                                    <option value="dịch vụ 1"> dịch vụ 1 </option>
                                    <option value="dịch vụ 2"> dịch vụ 2 </option>
                                    <option value="dịch vụ 3"> dịch vụ 3 </option>
                                    <option value="dịch vụ 4"> dịch vụ 4 </option>
                                    <option value="dịch vụ 5"> dịch vụ 5 </option>
                        </select>
                        
                        <div class="form-group">
                            <label >Trạng thái</label>
                            <input type="text" class="form-control" id="trangthai" name ="trangthai">
                        </div>
                       
                        <div class="form-group">
                            <button type="submit" class="btn btn-default" name="btnThem">Them</button>
                        </div>

            </form>


                        

        </div>

<?php include('footer.php') ?>