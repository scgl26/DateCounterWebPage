<?php
// Target date definition (YYYY-MM-DD HH:MM:SS format)
$hedef_tarih = "2028-03-07 10:59:59";
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Geri Sayım Sayacı</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #1a1a2e;
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .timer-container {
            text-align: center;
            background: #16213e;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.5);
        }
        .countdown {
            display: flex;
            gap: 20px;
            margin-top: 20px;
        }
        .box {
            background: #0f3460;
            padding: 20px;
            border-radius: 10px;
            min-width: 80px;
        }
        .number {
            font-size: 2.5rem;
            font-weight: bold;
            color: #e94560;
        }
        .label {
            font-size: 0.9rem;
            text-transform: uppercase;
            margin-top: 5px;
        }
    </style>
</head>
<body>

<div class="timer-container">
    <h2>DK'in dönmesine Kalan Zaman</h2>
    <p>Hedef: <strong><?php echo $hedef_tarih; ?></strong></p>

    <div class="countdown">
        <div class="box"><div class="number" id="gun">00</div><div class="label">Gün</div></div>
        <div class="box"><div class="number" id="saat">00</div><div class="label">Saat</div></div>
        <div class="box"><div class="number" id="dakika">00</div><div class="label">Dakika</div></div>
        <div class="box"><div class="number" id="saniye">00</div><div class="label">Saniye</div></div>
    </div>
</div>

<script>
    // Target date set in PHP is passed to JS here
    const hedefTarih = new Date("<?php echo $hedef_tarih; ?>").getTime();

    const sayac = setInterval(function() {
        const simdi = new Date().getTime();
        const fark = hedefTarih - simdi;

        if (fark < 0) {
            clearInterval(sayac);
            document.querySelector(".timer-container").innerHTML = "<h2>Süre Doldu!</h2>";
            return;
        }

        const gun = Math.floor(fark / (1000 * 60 * 60 * 24));
        const saat = Math.floor((fark % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const dakika = Math.floor((fark % (1000 * 60 * 60)) / (1000 * 60));
        const saniye = Math.floor((fark % (1000 * 60)) / 1000);

        document.getElementById("gun").innerText = gun < 10 ? "0" + gun : gun;
        document.getElementById("saat").innerText = saat < 10 ? "0" + saat : saat;
        document.getElementById("dakika").innerText = dakika < 10 ? "0" + dakika : dakika;
        document.getElementById("saniye").innerText = saniye < 10 ? "0" + saniye : saniye;
    }, 1000);
</script>

</body>
</html>