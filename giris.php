<?php
$gecici = $_POST['mail'];

if (!empty($_POST['mail'])) {
    if ($_POST['mail'] == "b241210034@sakarya.edu.tr") {
        if (empty($_POST['sifre'])) {
            echo "Şifreyi girin";
            echo "<p> <a href='index.html'>&lt;GERİ DÖN&gt;</a></p> ";
        } elseif ($_POST['sifre'] != "b241210034") {
            echo "Şifre yanlış";
            echo "<p> <a href='index.html'>&lt;GERİ DÖN&gt;</a></p> ";
        } else {
            $kullaniciAdi = explode("@", $gecici)[0];
            $message = "Hoş Geldin $kullaniciAdi --> Tamam tuşuna basınca ana sayfaya yönlendirileceksiniz...";
            echo "<script type='text/javascript'>alert('$message');</script>";
            header("Refresh: 0.1; indexBootstrap.html");
            exit();
        }
    } else {
        echo "E-posta veya şifre hatalı";
        echo "<p> <a href='index.html'>&lt;GERİ DÖN&gt;</a></p> ";
    }
} else {
    echo "Değerleri doldurun";
    echo "<p> <a href='index.html'>&lt;GERİ DÖN&gt;</a></p> ";
}
?>
