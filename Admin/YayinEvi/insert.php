<?php
include('../php/header.php');
require_once '../../baglan.php';

if (isset($_POST['submit']))
{
    $yayinEviAdi=isset($_POST['yayinEviAdi']) ? $_POST['yayinEviAdi']:null;
    $telefon=isset($_POST['telefon']) ? $_POST['telefon']:null;
    $email=isset($_POST['email']) ? $_POST['email']:null;
    $adres=isset($_POST['adres']) ? $_POST['adres']:null;
    $domain=isset($_POST['domain']) ? $_POST['domain']:null;

    if (!$yayinEviAdi || !$telefon || !$email || !$adres || !$domain)
    {
        $hata="<strong> Lütfen boş alanları doldurunuz!!!</strong>";
    }

    else{

        $sorgu=$db->prepare('INSERT INTO yayinevi SET
              Adi=?,
              Tel=?,
              Email=?,
              Adres=?,
              Domain=?');
        $ekle=$sorgu->execute([$yayinEviAdi,$telefon,$email,$adres,$domain]);

        if($ekle)
        {
            $hata="Veriler başarılı bir şekilde eklendi";
            $yayinEviAdi=null;
            $telefon=null;
            $email=null;
            $adres=null;
            $domain=null;
        }
        else
        {
            $hata="veriler kaydedilemedi";

        }

    }
}




?>



    <a href="index.php" class="btn btn-primary float-right mb-3">Anasayfaya Geri Dön</a>
    <h1 class="display-5 mb-4">Yayın Evi Ekle</h1>
    <?php if (isset($hata)){
    echo "<div class='alert alert-warning'>".$hata."</div>";
    }
    ?>
    <form method="post">
    <div class="form-group">
        <div class="col-md-2"><label class="font">Yayın Evi Adı</label></div>
        <div class="col-lg-offset-0 col-md-12"><input type="text" name="yayinEviAdi" class="form-control" value="<?php if (isset($_POST['submit'])){echo $yayinEviAdi;} ?>"></div>
    </div>


    <div class="form-group">
        <div class="col-md-2"><label class="font">Telefon</label></div>
        <div class="col-lg-offset-0 col-md-12"><input type="tel" name="telefon" class="form-control" value="<?php if (isset($_POST['submit'])){echo $telefon;} ?>"></div>
    </div>

    <div class="form-group">
        <div class="col-md-2"><label class="font">Email</label></div>
        <div class="col-lg-offset-0 col-md-12"><input type="text" name="email" class="form-control" value="<?php if (isset($_POST['submit'])){echo $email;} ?>"></div>
    </div>

    <div class="form-group">
        <div class="col-md-2"><label class="font">Adres</label></div>
        <div class="col-lg-offset-0 col-md-12"><textarea class="form-control" name="adres"><?php if (isset($_POST['submit'])){echo $adres;} ?></textarea></div>
    </div>

        <div class="form-group">
            <div class="col-md-2"><label class="font">Domain</label></div>
            <div class="col-lg-offset-0 col-md-12"><input type="text" name="domain" class="form-control" value="<?php if (isset($_POST['submit'])){echo $domain;} ?>"></div>
        </div>

        <div class="form-group">
            <input type="hidden" name="submit" value="1">
            <div class="col-lg-offset-0 col-md-12"><button type="submit" class="btn btn-success offset-5">Yayın Evi Ekle</button></div>
        </div>

    </form>







<?php
include('../php/footer.php');
?>