<?php
include('../php/header.php');
require_once '../../baglan.php';

    if(isset($_GET['id']))
    {
        $sorgu=$db->prepare('SELECT * FROM uyeler where id=?');
        $sorgu->execute([$_GET['id']]);
        $uye=$sorgu->fetch(PDO::FETCH_ASSOC);
    }



    if(isset($_POST['submit']))
    {
        $Adi=isset($_POST['adi']) ? $_POST['adi']:null;
        $Soyadi=isset($_POST['soyadi']) ? $_POST['soyadi']:null;
        $Tc=isset($_POST['tc']) ? $_POST['tc']:null;
        $Dogum_Tarihi=isset($_POST['dogumtarihi']) ? $_POST['dogumtarihi']:null;
        $Cinsiyet=isset($_POST['cinsiyet']) ? $_POST['cinsiyet']:null;
        $Tel=isset($_POST['tel']) ? $_POST['tel']:null;
        $Email=isset($_POST['email']) ? $_POST['email']:null;
        $Kimlik=isset($_POST['kimlik']) ? $_POST['kimlik']:null;
        $kutuphaneId=1;
        $Adres=isset($_POST['adres']) ? $_POST['adres']:null;
        $sifre=isset($_POST['sifre']) ? $_POST['sifre']:null;

        if (!$Adi or !$Soyadi or !$Tc or !$Dogum_Tarihi or !$Cinsiyet or !$Tel or !$Email or !$Kimlik or !$Adres or !$sifre)
        {
            $hata="<strong> Lütfen boş alanları doldurunuz!!!</strong>";
        }

        else{
            $sorgu4=$db->prepare('UPDATE uyeler SET
              Adi=?,
              Soyadi=?,
              Tc=?,
              Dogum_Tarihi=?,
              Cinsiyet=?,
              Tel=?,
              Email=?,
              Kimlik=?,
              KutuphaneId=?,
              Adres=?,
              sifre=? WHERE id='.$_GET['id'].';' );
            $guncelle=$sorgu4->execute([$Adi,$Soyadi,$Tc,$Dogum_Tarihi,$Cinsiyet,$Tel,$Email,$Kimlik,$kutuphaneId,$Adres,$sifre]);

            if ($guncelle)
            {
                $hata="Veriler başarılı bir şekilde güncellendi";
                header("Location:index.php");
            }
            else
            {
                $hata="Güncelleme Gerçekleşemedi !!!";
            }

        }
    }
    ?>


<a href="index.php" class="btn btn-primary float-right mb-3 mr-3">Anasayfaya Dön</a>
<h1 class="display-5 mb-4">Uye Güncelle</h1>
<?php if (isset($hata)){
    echo "<div class='alert alert-warning'>".$hata."</div>";
}
?>
    <form method="post">
        <div class="form-group">
            <div class="col-md-2"><label class="font">Adı</label></div>
            <div class="col-lg-offset-0 col-md-12"><input type="text" name="adi" class="form-control" value="<?php if (isset($_POST['submit'])){echo $Adi;} if (isset($_GET['id']) && !isset($_POST['submit'])){ echo $uye['Adi'];}?>"></div>
        </div>


        <div class="form-group">
            <div class="col-md-2"><label class="font">Soyadı</label></div>
            <div class="col-lg-offset-0 col-md-12"><input type="text" name="soyadi" class="form-control" value="<?php if (isset($_POST['submit'])){echo $Soyadi;} if (isset($_GET['id']) && !isset($_POST['submit'])){ echo $uye['Soyadi'];}?>"></div>
        </div>

        <div class="form-group">
            <div class="col-md-2"><label class="font">Tc</label></div>
            <div class="col-lg-offset-0 col-md-12"><input type="text" name="tc" class="form-control" value="<?php if (isset($_POST['submit'])){echo $Tc;} if (isset($_GET['id']) && !isset($_POST['submit'])){ echo $uye['Tc'];}?>"></div>
        </div>

        <div class="form-group">
            <div class="col-md-2"><label class="font">Doğum Tarihi</label></div>
            <div class="col-lg-offset-0 col-md-12"><input type="date" name="dogumtarihi" class="form-control" value="<?php if (isset($_POST['submit'])){echo $Dogum_Tarihi;} if (isset($_GET['id']) && !isset($_POST['submit'])){ echo $uye['Dogum_Tarihi'];}?>"></div>
        </div>

        <div class="form-group">
            <div class="col-md-2"><label class="font">Cinsiyet</label></div>
            <div class="col-lg-offset-0 col-md-12">
                <select name="cinsiyet" class="form-control">
                    <option value="">---Seçim Yapınız---</option>
                    <?php if ($uye['Cinsiyet']){echo "<option value='0'>Kadın</option><option value='1' selected>Erkek</option>";}else{echo "<option value='0' selected>Kadın</option><option value='1'>Erkek</option>";}?>
                </select>
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-2"><label class="font">Tel</label></div>
            <div class="col-lg-offset-0 col-md-12"><input type="text" name="tel" class="form-control" value="<?php if (isset($_POST['submit'])){echo $Tel;} if (isset($_GET['id']) && !isset($_POST['submit'])){ echo $uye['Tel'];}?>"></div>
        </div>
        <div class="form-group">
            <div class="col-md-2"><label class="font">Email</label></div>
            <div class="col-lg-offset-0 col-md-12"><input type="text" name="email" class="form-control" value="<?php if (isset($_POST['submit'])){echo $Email;} if (isset($_GET['id']) && !isset($_POST['submit'])){ echo $uye['Email'];}?>"></div>
        </div>

        <div class="form-group">
            <div class="col-md-2"><label class="font">Kimlik</label></div>
            <div class="col-lg-offset-0 col-md-12">
                <select name="kimlik" class="form-control">
                    <option value="" >---Seçim Yapınız---</option>
                    <?php if ($uye['Kimlik']){echo "<option value='0'>Kullanıcı</option><option value='1' selected>Admin</option>";}else{echo "<option value='0' selected>Kullanıcı</option><option value='1'>Admin</option>";}?>
                </select>
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-2"><label class="font">Adres</label></div>
            <div class="col-lg-offset-0 col-md-12"><textarea name="adres" class="form-control" rows="5"><?php if (isset($_POST['submit'])){echo $Adres;} if (isset($_GET['id']) && !isset($_POST['submit'])){ echo $uye['Adres'];}?></textarea></div>
        </div>

        <div class="form-group">
            <div class="col-md-2"><label class="font">Şifre</label></div>
            <div class="col-lg-offset-0 col-md-12"><input type="text" name="sifre" class="form-control" value="<?php if (isset($_POST['submit'])){echo $sifre;} if (isset($_GET['id']) && !isset($_POST['submit'])){ echo $uye['sifre'];}?>"></div>
        </div>

        <div class="form-group">
            <input type="hidden" name="submit" value="1">
            <div class="col-lg-offset-0 col-md-12"><button type="submit" class="btn btn-success offset-5">Üye Güncelle</button></div>
        </div>


    </form>


<?php
include('../php/footer.php');
?>