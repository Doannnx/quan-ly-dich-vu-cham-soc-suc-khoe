<?php include('dbconn.php'); ?>
<?php include('header.php'); ?>

     <?php
    $sql= "SELECT * FROM tbbacsi";

    $result= $conn->query($sql);
    if($result->num_rows==0){
        echo "k co du lieu";
    }
    
    ?>
    <h2>Danh sách bác sĩ</h2>
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
                if(isset($_GET['bsu_msg'])){
                    $alert="<script> alert('Sửa thành công !');</script>";
                    echo $alert ;
                }
             ?> 
            </div>
    </div>
    
        <table class="table table-hover">

            <thead>
            <tr>
                <th>id </th>
                <th>Họ tên</th>
                <th>Giới tính</th>
                <th>Chuyên khoa </th>
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
            
                <td><?php echo $row ['idbacsi']?></td>
                <td><?php echo $row ['hotenbs']?></td>
                <td><?php echo $row ['gioitinh']?></td>
                <td><?php echo $row ['chuyenkhoa']?></td>
                <td><?php echo $row ['sdt']?></td>
                <td><?php echo $row ['email']?></td>
                <td><?php echo $row ['diachi']?></td>


                <td>
                    <a href="update_bacsi.php?idbacsi=<?php echo$row['idbacsi']?>"> Edit</a>
                    <span>|</span>
                    <a onclick="return confirm('Bạn có muốn xóa ?')"
                    href="delete_bacsi.php?idbacsi=<?php echo$row['idbacsi']?>"> Delete</a>
                </td>
            </tr>
            </tbody>
            <?php
            }
            $conn->close();
            ?>

           

            <!-- Modal -->
            <form action="insert_bacsi.php" method="POST">
            <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thêm bác sĩ</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">


                
                
                <div class="form-group">
                    <label >Họ tên</label>
                    <input type="text" class="form-control" id="hotenbs" name ="hotenbs">
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
                    <input type="text" class="form-control" id="chuyenkhoa" name ="chuyenkhoa">
                </div>
                <div class="form-group">
                    <label >Số điện thoại</label>
                    <input type="text" class="form-control" id="sdt" name ="sdt">
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
