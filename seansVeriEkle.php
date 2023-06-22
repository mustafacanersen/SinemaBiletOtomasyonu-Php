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
$salon = $_POST['salon'];
$seans = $_POST['seans'];


$sql = "INSERT INTO seanslar (filmAdi, salon, seans)
VALUES ('$filmAdi', '$salon', '$seans')";

if (mysqli_query($conn, $sql)) {
    header("Location: seansEkle.php");
    exit();
}
else{
    echo "Hata: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
