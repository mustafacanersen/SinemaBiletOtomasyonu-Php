<!DOCTYPE html>
<html lang="tr-TR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Sinema Bilet Otomasyonu</title>
</head>
<body>
    <nav>
        <a href="index.php"><b>Anasayfa</b></a>
        <a href="FilmEkle.php"><b>Film Ekle</b></a>
        <a href="seansEkle.php"><b>Seans Ekle</b></a>
        <a href="hasılat.php"><b>Hasılat</b></a>
    </nav>
    <form action="seansVeriEkle.php" method="post">
        <div class="seansEkle">
            <label for="filmAdi">Film:</label>
            <select name="filmAdi" id="filmAdi">
                <option value="">--Film Seçiniz--</option>
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "sinema";
    
                $conn = mysqli_connect($servername, $username, $password, $dbname);
                    $result = mysqli_query($conn, "SELECT * FROM filmler");
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<option value='" . $row["filmAdi"] . "'>" . $row["filmAdi"] . "</option>"; 
                    }
                    mysqli_close($conn);
                ?>
            </select>
        </div>
        <div class="seansEkle">
            <label for="salon">Salon:</label>
            <select name="salon" id="salon">
                <option value="">--Salon Seçiniz--</option>
                <option value="kırmızısalon">Kırmızı Salon</option>
                <option value="mavisalon">Mavi Salon</option>
            </select>
        </div>
        <div class="seansEkle">
            <label for="seans">Seans:</label>
            <input type="radio" name="seans" value="11:00">11:00
            <input type="radio" name="seans" value="14:30">14:30
            <input type="radio" name="seans" value="18:00">18:00
            <input type="radio" name="seans" value="21:30">21:30
        </div>
        <div class="seansEkle">
            <button type="submit">Ekle</button>
        </div>
    </form>
</body>
</html>