<?php
include('../php/header.php');
require_once '../../baglan.php';


    if (isset($_POST['submit']))
    {
        $yazarAdi=isset($_POST['yazarAdi']) ? $_POST['yazarAdi']:null;
        $yazarSoyadi=isset($_POST['yazarSoyadi']) ? $_POST['yazarSoyadi']:null;

        if(!$yazarAdi || !$yazarSoyadi)
        {
            $hata="Lütfen boş alanları giriniz!!!";
        }

        else{
            $sorgu=$db->prepare('INSERT INTO yazarlar SET  Adi=?,Soyadi=?');
            $ekle=$sorgu->execute([$yazarAdi,$yazarSoyadi]);

            if ($ekle)
            {
                $hata="'".$yazarAdi.$yazarSoyadi."'"." başarılı bir şekilde veritabanına eklendi...";
                $yazarAdi=null;
                $yazarSoyadi=null;
            }
            else{
                $hata="Veri Tabanına veri Eklenemedi!!!";

            }
        }
    }
?>

    <a href="index.php" class="btn btn-primary float-right mb-3">Anasayfaya Geri Dön</a>
    <h1 class="display-5 mb-4">Yazar Ekle</h1>
    <?php if (isset($hata)){
    echo "<div class='alert alert-success'><strong>".$hata."</strong></div>";
    }
    ?>
    <form method="post">
        <div class="form-group">
            <div class="col-md-2"><label class="font">Yazar Adı</label></div>
            <div class="col-lg-offset-0 col-md-12"><input type="text" name="yazarAdi" class="form-control"></div>
        </div>

        <div class="form-group">
            <div class="col-md-2"><label class="font">Yazar Soyadı</label></div>
            <div class="col-lg-offset-0 col-md-12"><input type="text" name="yazarSoyadi" class="form-control"></div>
        </div>

        <div class="form-group">
            <input type="hidden" name="submit" value="1">
            <div class="col-lg-offset-0 col-md-12"><button type="submit" class="btn btn-success offset-5">Yazar Ekle</button></div>
        </div>
    </form>
<?php
include('../php/footer.php');
?>