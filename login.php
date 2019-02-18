<?php
include "php/meta.php";
require 'baglan.php';

if(isset($_POST['submit']))
{
    $uye_email=$_POST['email'];
    $uye_sifre=$_POST['sifre'];

    if (!$uye_email and !$uye_sifre)
    {
        $hata="Lütfen kullanıcı adı veya şifrenizi giriniz.";
    }

    elseif (!$uye_email)
    {
        $hata="Lütfen email adresinizi giriniz.";
    }

    elseif (!$uye_sifre)
    {
        $hata="Lütfen şifrenizi giriniz.";
    }
    else{
        $kullanicisor=$db->prepare('SELECT * FROM uyeler WHERE Email=? and sifre=?');
        $kullanicisor->execute([$uye_email,$uye_sifre]);
        $uye=$kullanicisor->fetch(PDO::FETCH_ASSOC);

        if ($uye['Kimlik']){
            $_SESSION['Adi']=$uye['Adi'];
            $_SESSION['Soyadi']=$uye['Soyadi'];
            $_SESSION['Kimlik']=$uye['Kimlik'];
            header('Location:Admin/index.php');
        }
        if ($uye['Kimlik']==false){
            $_SESSION['Adi']=$uye['Adi'];
            $_SESSION['Soyadi']=$uye['Soyadi'];
            $_SESSION['Kimlik']=$uye['Kimlik'];
            header('Location:index.php');
        }
    }

}

?>

<div class="container p-3 bg-light col-lg-3 col-md-10" style="border-radius: 10px; position: relative; margin-top:12%;">

    <div class="row">
        <span class="lead ml-3" style="font-family:Raleway-Medium; font-size:30px; display: block;">Giriş Yap</span>

        <div class="col-12">
            <form method="post">
            <div class="form-group">
                <label style="font-size: 13px; line-height: 1.4;">Email</label>
                <input type="text" class="form-control" value="<?php if(isset($_POST['submit'])){echo $uye_email;}    ?>" name="email" style="font-size: 25px; height: 60px;">
            </div>
            <div class="form-group">
                <label style="font-size: 13px; line-height: 1.4;">Şifre</label>
                <input type="password" class="form-control" name="sifre" style="font-size: 25px; height: 60px;">
            </div>

            <div class="form-group">
                <input type="checkbox" style="cursor: pointer;">
                <label style="font-size: 13px; line-height: 1.4; cursor: pointer; color: #999999;">Beni Hatırla</label>
                <label class="float-right" style="font-size: 13px; line-height: 1.4; cursor: pointer; color: #999999;">Şifremi Unuttum</label>
            </div>

                <div class="form-group"><label class="text-center" style="font-size: 13px; line-height: 1.4; cursor: pointer; color: #999999;"><?php if(isset($hata)){echo $hata;} ?></label></div>

                <div class="form-group">
                <input type="hidden" name="submit" value="1">
            <button type="submit" class="btn btn-dark" style="border-radius: 20px;">Giriş Yap</button>
            </div>
            </form>
        </div>
    </div>
</div>