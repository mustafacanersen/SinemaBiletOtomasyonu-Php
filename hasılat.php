<!DOCTYPE html>
<html lang="tr-TR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sinema Bilet Otomasyonu</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" type="text/javascript""></script>
    <script type="text/javascript">
         $(document).ready(function(){
            $('#filmAdi').change(function(){
                var filmAdi=$(this).val();
                $.ajax({
                    url:"hasılatAjax.php",
                    method:"POST",
                    data:{filmAdi:filmAdi},
                    dataType:"text",
                    success:function(data){
                        $('#seans').html(data);
                    }
                });
            });
        });

</script>
</head>

<body>
    <nav>
        <a href="index.php"><b>Anasayfa</b></a>
        <a href="FilmEkle.php"><b>Film Ekle</b></a>
        <a href="seansEkle.php"><b>Seans Ekle</b></a>
        <a href="hasılat.php"><b>Hasılat</b></a>
    </nav>
    <form action="hasılat.php" method="post">
        <div class="hasilat">
            <label for="filmAdi">Film:</label>
            <select name="filmAdi" id="filmAdi">
                <option value="">--Film Seçiniz--</option>
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "sinema";
    
                $conn = mysqli_connect($servername, $username, $password, $dbname);
                    $result = mysqli_query($conn, "SELECT * FROM biletsatis");
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<option value='" . $row["filmAdi"] . "'>" . $row["filmAdi"] . "</option>"; 
                    }
                    mysqli_close($conn);
                ?>
            </select>
        </div>
        <div class="hasilat">
            <label for="seans">Seans:</label>
            <select name="seans" id="seans">
                <option value="">--Seans Seçiniz--</option>
            </select>
        </div>
        <div class="hasilat">
            <label for="tarih">Tarih:</label>
            <input type="date" name="tarih" id="tarih">
            <input type="checkbox" name="genelhasilat" id="genelhasilat">Genel Hasılat
        </div> 
        <div class="hasilat">
            <button type="submit">Hesapla</button>
        </div> 
    </form>
    <p class="hesap">
        Hasılat <span id="hasilatSpan"> <?php
                if (isset($_POST['filmAdi']) && isset($_POST['seans']) && isset($_POST['tarih'])){
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "sinema";
                $conn = mysqli_connect($servername, $username, $password, $dbname);
                if (!$conn) {
                    die("Bağlantı hatası: " . mysqli_connect_error());
                }
                
                $filmAdi = $_POST['filmAdi'];
                $seans = $_POST['seans'];
                $tarih = $_POST['tarih'];

                    $result = mysqli_query($conn, "SELECT sum(fiyat) as 'hasilat' FROM biletsatis WHERE filmAdi = '$filmAdi' AND seans = '$seans' AND tarih='$tarih'");
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo $row['hasilat']; 
                    }
                    mysqli_close($conn);
                }
                else{
                    echo 0;
                }
                ?></span> TL
    </p>
        

    
</body>
</html>