<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sinema";

$conn = mysqli_connect($servername, $username, $password, $dbname);
$myOption = '';
    $sql ="SELECT * FROM seanslar WHERE filmAdi = '".$_POST['filmAdi']."' LIMIT 1 ";
    $sonuc = mysqli_query($conn,$sql);
    $myOption .= '<option value="" disabled selected>--Salon Seçiniz--</option>';
    while($row=mysqli_fetch_array($sonuc)){
        $myOption .='<option value = "'.$row["salon"].'">'.$row["salon"].'</option>';
    }
    echo $myOption;
    mysqli_close($conn);
    
?>