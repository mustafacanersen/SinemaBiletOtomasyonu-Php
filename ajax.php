<?php


    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "sinema";
    
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    
    $output = '';
    $query ="SELECT * FROM seanslar WHERE filmAdi = '".$_POST['filmAdi']."' ";
    $result = mysqli_query($conn,$query);
    $output .= '<option value="" disabled selected>--Seans Seçiniz--</option>';
    while($row=mysqli_fetch_array($result)){
        $output .='<option value = "'.$row["seans"].'">'.$row["seans"].'</option>';
    }
    echo $output;
    mysqli_close($conn);





?>