<?php
    $servername = "localhost:3308";
    $username = "root" ;
    $password ="";
    $dbname = "dbdvchamsockhachhang";
    //khoi tao ket noi
    $conn = new mysqli($servername,$username,$password,$dbname);
    //ktra ket noi
    if($conn-> connect_error){
        die("ket noi that bai". $conn->connect_error);
    }
?>