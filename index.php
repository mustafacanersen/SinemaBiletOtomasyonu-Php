<!DOCTYPE html>
<html lang="tr-TR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Sinema Bilet Otomasyonu</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" type="text/javascript""></script>
    <script type="text/javascript">
         $(document).ready(function(){
            $('#filmAdi').change(function(){
                var filmAdi=$(this).val();
                $.ajax({
                    url:"ajax.php",
                    method:"POST",
                    data:{filmAdi:filmAdi},
                    dataType:"text",
                    success:function(data){
                        $('#seans').html(data);
                    }
                });
            });
        });
        $(document).ready(function(){
            $('#filmAdi').change(function(){
                var filmAdi=$(this).val();
                $.ajax({
                    url:"filmBilgileri.php",
                    method:"POST",
                    data:{filmAdi:filmAdi},
                    dataType:"text",
                    success:function(data){
                        $('.filmBilgileri').html(data);
                    }
                });
            });
        });
        $(document).ready(function(){
            $('#seans').change(function(){
                var filmAdi=$('#filmAdi').val();
                $.ajax({
                    url:"action.php",
                    method:"POST",
                    data:{filmAdi:filmAdi},
                    dataType:"text",
                    success:function(data){
                        $('#salon').html(data);
                    }
                });
            });
        });

        window.onload = function() {
        const seat = document.querySelector('.container');
        if(seat != null){
        seat.addEventListener('click',function(e){
            if(e.target.classList.contains('seat') && !e.target.classList.contains('reserved')){
                e.target.classList.toggle('selected');
                console.log(e);
            }
        let koltuk = document.getElementById("koltuk");
        koltuk.value=document.querySelector('.seat.selected').innerHTML;
            
        });
        } else {
            console.log("Eleman Bulunamadı");
        }
        };
        function fiyatHesapla() {
        let biletTur = document.getElementById("biletTürü").value;
        let fiyat = document.getElementById("fiyat");
    
        if (biletTur === "ogrenci") {
        fiyat.innerHTML = "50";
        } else if (biletTur === "tam") {
        fiyat.innerHTML = "70";
        } else {
        fiyat.innerHTML = "";
        }
        }
    </script>
</head>
<body>
    <nav>
        
          <a href="index.php"><b>Anasayfa</b></a>
          <a href="filmEkle.php"><b>Film Ekle</b></a>
          <a href="seansEkle.php"><b>Seans Ekle</b></a>
          <a href="hasılat.php"><b>Hasılat</b></a>
        
      </nav>
    <form action="biletSatis.php" method="post">
        <span style="color:wheat;">Bilet Satış</span>
            <div class="form-grup">
                <label for="tarih">Tarih: </label>
                <input type="date" name="tarih" id="tarih" value="<?php echo date('Y-m-d'); ?>">
            </div>
            <div class="form-grup">
                <label for="filmAdi">Film: </label>
                <select name="filmAdi" id="filmAdi" >
                <option value="" disabled selected>--Film Seçiniz--</option>
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
            
            <div class="form-grup">
                <label for="seans">Seans: </label>
                <select name="seans" id="seans">
                <option value="">--Seans Seçiniz--</option>
    
                </select>
            </div>
            <div class="form-grup">
                <label for="salon">Salon: </label>
                <select name="salon" id="salon">
                <option value="">--Salon Seçiniz--</option>
                </select>
            </div>
            <div class="form-grup">
                <label for="koltuk">Koltuk: </label>
                <input type="text" name="koltuk" id="koltuk">
            </div>
            <div class="form-grup">
                <label for="biletTürü">Bilet Türü: </label>
                <select name="biletTürü" id="biletTürü" onchange="fiyatHesapla()">
                <option value="" disabled selected>--Bilet Türünü Seçiniz--</option>
                <option value="tam">Tam</option>
                <option value="ogrenci">Öğrenci</option>
                </select>
            </div>
            <div class="form-grup">
            <p>
                Fiyat:   <span id="fiyat"></span>
            </p>
            </div>
            <div class="form-grup">
                <button type="submit"> Bilet Oluştur </button>
            </div>

        </form>
    <div class="filmBilgileri">
        Film Adı:  <span id="filmAdiSpan"></span><br>
        Yönetmen:  <span id="yönetmenSpan"></span><br>
        Tür:  <span id="türSpan"></span><br>
        Süre:  <span id="süreSpan"></span><br>
        Oyuncular:<br>  <textarea name="oyuncular" id = "oyuncular" rows="15" cols="30"></textarea>

    </div>
    <div class="container">
        <div class="screen"></div>
        <div class="row">
            <div class="seat">A1</div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
        </div>
        <div class="row">
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
        </div>
        <div class="row">
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
        </div>
        <div class="row">
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
        </div>
        <div class="row">
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
        </div>
    </div>
       
</body>
</html>