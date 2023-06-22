<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sinema";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Bağlantı hatası: " . mysqli_connect_error());
}

$filmAdi = $_POST['filmAdi'];
$yönetmen = $_POST['yönetmen'];
$tür = $_POST['tür'];
$süre = $_POST['süre'];
$oyuncular = $_POST['oyuncular'];


$sql = "INSERT INTO filmler (filmAdi, yönetmen, tür, süre, oyuncular)
VALUES ('$filmAdi', '$yönetmen', '$tür', '$süre', '$oyuncular')";

if (mysqli_query($conn, $sql)) {
    header("Location: filmEkle.php");
    exit();
}
else{
    echo "Hata: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
