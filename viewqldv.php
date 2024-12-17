<?php include('dbconn.php'); ?>
<?php include('header.php'); ?>

     <?php
    $sql= "SELECT * FROM tbdichvu";

    $result= $conn->query($sql);
    if($result->num_rows==0){
        echo "k co du lieu";
    }
    
    ?>
    <h2>Danh sách dịch vụ</h2>
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
                <th>id dv</th>
                <th>Tên dịch vụ</th>
                <th>Giá dịch vụ</th>
                
            </tr>
            </thead>
            <tbody>
        <?php  
            while($row = $result->fetch_assoc()){
            
        ?>
            <tr>
            
                <td><?php echo $row ['iddv']?></td>
                <td><?php echo $row ['tendv']?></td>
                <td><?php echo $row ['giadv']?></td>


                <td>
                    <a href="update_dv.php?iddv=<?php echo$row['iddv']?>"> Edit</a>
                    <span>|</span>
                    <a onclick="return confirm('Bạn có muốn xóa ?')"
                    href="delete_dv.php?iddv=<?php echo$row['iddv']?>"> Delete</a>
                </td>
            </tr>
            </tbody>
            <?php
            }
            $conn->close();
            ?>

           

            <!-- Modal -->
            <form action="insert_dv.php" method="POST">
            <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thêm lịch h</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">


                
                <div class="form-group">
                    <label >Tên dịch vụ</label>
                    <input type="text" class="form-control" id="tendv" name ="tendv">
                </div>
                <div class="form-group">
                    <label >Giá dịch vụ</label>
                    <input type="text" class="form-control" id="giadv" name ="giadv">
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
