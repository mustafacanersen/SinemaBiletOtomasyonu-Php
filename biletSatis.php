<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sinema";


$conn = mysqli_connect($servername, $username, $password, $dbname);


if (!$conn) {
    die("Bağlantı hatası: " . mysqli_connect_error());
}

$filmAdi= $_POST['filmAdi'];
$seans = $_POST['seans'];
$koltuk =$_POST['koltuk'];
$biletTürü = $_POST['biletTürü'];
$fiyatListe = array("ogrenci" => 50, "tam" => 70);

if(isset($_POST["biletTürü"])){
   $secilenTür = $_POST["biletTürü"];
   $fiyat= $fiyatListe[$secilenTür];
}


$tarih = $_POST['tarih'];
$salon = $_POST['salon'];



$sql = "INSERT INTO biletsatis (filmAdi, seans, koltuk, biletTürü, fiyat, tarih, salon )
VALUES ('$filmAdi', '$seans', '$koltuk', '$biletTürü', '$fiyat', '$tarih', '$salon')";

if (mysqli_query($conn, $sql)) {
    header("Location: index.php");
    exit();
}
else{
    echo "Hata: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>