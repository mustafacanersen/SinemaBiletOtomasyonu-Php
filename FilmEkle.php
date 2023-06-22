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
    <form action="filmVeriEkle.php" method="post">
        <div class="filmEkle">
            <label for="filmAdi">Film Adı: </label>
            <input type="text" name="filmAdi" id="filmAdi">
        </div>
        <div class="filmEkle">
            <label for="yönetmen">Yönetmen: </label>
            <input type="text" name="yönetmen" id="yönetmen">
        </div>
        <div class="filmEkle">
            <label for="tür">Tür: </label>
            <input type="text" name="tür" id="tür">
        </div>
        <div class="FilmEkle">
            <label for="süre">Süre: </label>
            <input type="text" name="süre" id="süre">
        </div>
        <div class="filmEkle">
            <label for="oyuncular">Oyuncular: </label><br>
            <textarea name="oyuncular" rows="15" cols="30"></textarea>    
        </div>
        <div class="filmEkle">
            <button type="submit">Ekle</button>
        </div>    
    </form>

    
</body>
</html>
