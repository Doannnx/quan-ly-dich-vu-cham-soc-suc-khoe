<?php include('dbconn.php'); ?>
<?php include('header.php'); ?>

     <?php
    $sql= "SELECT * FROM tblichhen";

    $result= $conn->query($sql);
    if($result->num_rows==0){
        echo "k co du lieu";
    }
    
    ?>
    <h2>Danh sách lịch hẹn</h2>
    <div class="fun">
    <button type="button" class="btn btn-primary">
            <a href="insert_lichhen.php">Thêm</a>
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
                <th>id lịch hẹn</th>
    
                <th>Họ tên</th>
                <th>Số điện thoại</th>
                <th>Ngày Hẹn</th>
                <th>Thời gian</th>
            
                <th>Tên dịch vụ</th>
                <th>Trạng thái</th>

                
            </tr>
            </thead>
            <tbody>
        <?php  
            while($row = $result->fetch_assoc()){
            
        ?>
            <tr>
            
                <td><?php echo $row ['idlichhen']?></td>
                <td><?php echo $row ['hoten']?></td>
                <td><?php echo $row ['sodt']?></td>
                <td><?php echo $row ['ngayhen']?></td>
                <td><?php echo $row ['thoigian']?></td>
                
                <td><?php echo $row ['tendv']?></td>
                <td><?php echo $row ['trangthai']?></td>


                <td>
                    <a href="update_lichhen.php?idlh=<?php echo$row['idlichhen']?>"> Edit</a>
                    <span>|</span>
                    <a onclick="return confirm('Bạn có muốn xóa ?')"
                    href="delete_lichhen.php?idlh=<?php echo$row['idlichhen']?>"> Delete</a>
                </td>
            </tr>
            </tbody>
            <?php
            }
            $conn->close();
            ?>

           

            
            
<?php include('footer.php'); ?>