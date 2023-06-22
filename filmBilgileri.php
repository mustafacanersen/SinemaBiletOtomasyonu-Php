<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sinema";

$output= 'Film Adı:  <span id="filmAdiSpan"></span><br>
Yönetmen:  <span id="yönetmenSpan"></span><br>
Tür:  <span id="türSpan"></span><br>
Süre:  <span id="süreSpan"></span><br>
Oyuncular:<br>  <textarea name="oyuncular" id = "oyuncular" rows="15" cols="30"></textarea>';


$conn = mysqli_connect($servername, $username, $password, $dbname);
$query ="SELECT * FROM filmler WHERE filmAdi = '".$_POST['filmAdi']."' ";
$result = mysqli_query($conn,$query);
while($row=mysqli_fetch_array($result)){
    $output =' Film Adı:  <span id="filmAdiSpan" style="color:red;">'.$row["filmAdi"].'</span><br>
    Yönetmen:  <span id="yönetmenSpan"style="color:red;">'.$row["yönetmen"].'</span><br>
    Tür:  <span id="türSpan"style="color:red;">'.$row["tür"].'</span><br>
    Süre:  <span id="süreSpan"style="color:red;">'.$row["süre"].'</span><br>
    Oyuncular:<br>  <textarea name="oyuncular" id = "oyuncular" rows="15" cols="30">'.$row["oyuncular"].'</textarea>';
}
echo $output;
?>