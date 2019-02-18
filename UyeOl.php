<?php
include "php/meta.php";
include "php/header.php";
require_once 'baglan.php';
?>
<?php
if(isset($_POST['submit'])){
    $kimlik=0;
    $kutuphaneId=1;
    $tc=isset($_POST['tc']) ? $_POST['tc']:null;
    $soyad=isset($_POST['soyad']) ? $_POST['soyad']:null;
    $tel=isset($_POST['tel']) ? $_POST['tel']:null;
    $adres=isset($_POST['adres']) ? $_POST['adres']:null;
    $ad=isset($_POST['ad']) ? $_POST['ad']:null;
    $email=isset($_POST['email']) ? $_POST['email']:null;
    $sifre=isset($_POST['sifre']) ? $_POST['sifre']:null;
    $cinsiyet=isset($_POST['Cinsiyet']) ? $_POST['Cinsiyet']:null;
    $dogumtarih=isset($_POST['tarih']) ? $_POST['tarih']:null;

    if (!$tc || !$soyad || !$tel  || !$ad || !$email || !$adres || !$sifre || !$cinsiyet || !$dogumtarih){
        $hata="Lütfen boş alanları doldurunuz...";
    }
    else
    {
        $sorgu=$db->prepare('INSERT INTO uyeler SET 
        adi=?,
        soyadi=?,
        tc=?,
        dogum_Tarihi=?,
        cinsiyet=?,
        tel=?,
        email=?,
        Kimlik=?,
        kutuphaneId=?,
        adres=?,
        sifre=?');

        $ekle=$sorgu->execute([$ad,$soyad,$tc,$dogumtarih,$cinsiyet,$tel,$email,$kimlik,$kutuphaneId,$adres,$sifre]);
        if($ekle)
        {
            header('Location:index.php');
        }
        else{
            $hata="Lütfen boş alanları doldurunuz...";
        }
    }
}
?>

<hr class="col-md-7">
<div class="container mb-5">
    <h1 class="display-4">Uye Ol</h1>
    <?php
    if (isset($_POST['submit']))
    {
        echo  "<label class='alert alert-warning col-12 mt-2'><strong>".$hata."</strong></label>";
    }
 ?>
    <form method="post">
    <div class="row col-lg-12 mt-3">
        <div class="col-lg-6">
        <div class="form-group">
            <div class="col-md-2"><label class="font">Tc</label></div>
            <div class="col-md-12"><input type="text" class="form-control" name="tc" value="<?php if (isset($_POST['submit'])){ echo $tc;} ?>"></div>
        </div>

        <div class="form-group">
            <div class="col-md-2"><label class="font">Soyad</label></div>
            <div class="col-md-12"><input type="text" class="form-control" name="soyad" value="<?php if (isset($_POST['submit'])){ echo $soyad;} ?>"></div>
        </div>

        <div class="form-group">
            <div class="col-md-2"><label class="font">Tel</label></div>
            <div class="col-md-12"><input type="text" class="form-control" name="tel" value="<?php if (isset($_POST['submit'])){ echo $tel;} ?>"></div>
        </div>

            <div class="form-group">
                <div class="col-md-2"><label class="font">Adres</label></div>
                <div class="col-md-12"><textarea class="form-control" name="adres"><?php if (isset($_POST['submit'])){ echo $adres;} ?></textarea></div>
            </div>
            <div class="form-group">
                <div class="col-md-2"><label class="font">Sifre</label></div>
                <div class="col-md-12"><input type="password" class="form-control" name="sifre"></div>
            </div>

        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <div class="col-md-2"><label class="font">Ad</label></div>
                <div class="col-md-12"><input type="text" class="form-control" name="ad" value="<?php if (isset($_POST['submit'])){ echo $ad;} ?>"></div>
            </div>

            <div class="form-group">
                <div class="col-md-2"><label class="font">Email</label></div>
                <div class="col-md-12"><input type="text" class="form-control" name="email" value="<?php if (isset($_POST['submit'])){ echo $email;} ?>"></div>
            </div>

            <div class="form-group">
                <div class="col-md-5"><label class="font">Doğum Tarihi</label></div>
                <div class="col-md-12"><input type="date" class="form-control" name="tarih" value="<?php if (isset($_POST['submit'])){ echo $dogumtarih;} ?>"></div>
            </div>

            <div class="form-group">
                <div class="col-md-2"><label class="font">Cinsiyet</label></div>
                <div class="col-md-12 mt-3">
                    <input type="radio" value="0" name="Cinsiyet">Kadın
                    <input type="radio" value="1" name="Cinsiyet" class="ml-4">Erkek
                </div>
            </div>
    </div>
        <input type="hidden" name="submit" value="1">


        <button type="submit" class="btn btn-danger col-md-2 offset-md-5 mt-5">Üye Ol</button>
    </div>
    </form>
</div>
<hr class="col-md-6">

<?php
include "php/footer.php";
include "php/end.php";
?>