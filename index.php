<?php include('dbconn.php'); ?>
<?php include('header.php'); ?>

     <?php
    $sql= "SELECT * FROM tbbenhnhan";

    $result= $conn->query($sql);
    if($result->num_rows==0){
        echo "k co du lieu";
    }
    
    ?>
    <h2>Danh sách bệnh nhân</h2>
    <div class="fun">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add">
            Thêm
        </button>


        <div class="tb">
            <?php
                if(isset($_GET['i_msg'])){
                    $alert="<script> alert('Thêm thành công !');</script>";
                    echo $alert ;
                
                }
             ?> 

            <?php
                if(isset($_GET['d_msg'])){
                    $alert="<script> alert('xóa thành công !');</script>";
                    echo $alert ;
                }
             ?> 
            <?php
                if(isset($_GET['u_msg'])){
                    $alert="<script> alert('Sửa thành công !');</script>";
                    echo $alert ;
                }
             ?> 
            </div>



        <form action="timkiem.php" method="get">
            <input type="text" name="search" placeholder="tìm kiếm">
            <input type="submit" value="tìm">
        </form>
    </div>
    
        <table class="table table-hover">

            <thead>
            <tr>
                <th>id </th>
                <th>Họ tên</th>
                <th>Ngày sinh</th>
                <th>Giới tính</th>
                <th>Số điện thoại</th>
                <th>Email</th>
                <th>Địa chỉ</th>
            </tr>
            </thead>
            <tbody>
        <?php  
            while($row = $result->fetch_assoc()){
            
        ?>
            <tr>
            
                <td><?php echo $row ['idbenhnhan']?></td>
                <td><?php echo $row ['hoten']?></td>
                <td><?php echo $row ['ngaysinh']?></td>
                <td><?php echo $row ['gioitinh']?></td>
                <td><?php echo $row ['sodt']?></td>
                <td><?php echo $row ['email']?></td>
                <td><?php echo $row ['diachi']?></td>


                <td>
                    <a href="update_benhnhan.php?idbenhnhan=<?php echo$row['idbenhnhan']?>"> Edit</a>
                    <span>|</span>
                    <a onclick="return confirm('Bạn có muốn xóa ?')"
                    href="delete_benhnhan.php?idbenhnhan=<?php echo$row['idbenhnhan']?>"> Delete</a>
                </td>
            </tr>
            </tbody>
            <?php
            }
            $conn->close();
            ?>

           

            <!-- Modal -->
            <form action="insert_benhnhan.php" method="POST">
            <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thêm bệnh nhân</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">


                
                <div class="form-group">
                    <label >Id bệnh nhân</label>
                    <input type="text" class="form-control" id="idbn" name="idbenhnhan">
                </div>
                <div class="form-group">
                    <label >Họ tên</label>
                    <input type="text" class="form-control" id="hoten" name ="hoten">
                </div>
                <div class="form-group">
                    <label >Ngày sinh</label>
                    <input type="text" class="form-control" id="ngaysinh" name ="ngaysinh">
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
                    <input type="text" class="form-control" id="sodt" name ="sodt">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" id="email" name ="email">
                </div>
                <div class="form-group">
                    <label>Địa chỉ</label>
                    <input type="text" class="form-control" id="diachi" name ="diachi">
                </div>
                                    




                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                    <input type="submit" class="btn btn-success" name="btnthem" value="Thêm">
                </div>
                </div>
            </div>
            </div>
                    
            
<?php include('footer.php'); ?>
