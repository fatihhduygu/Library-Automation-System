<?php
include('../php/header.php');
require_once '../../baglan.php';

    if (isset($_GET['id']))
    {
        $sorgu=$db->prepare('SELECT * FROM kategori WHERE Id=?');
        $sorgu->execute([$_GET['id']]);
        $kategori=$sorgu->fetch(PDO::FETCH_ASSOC);

    }
    if(isset($_POST['submit'])){
        $kategoriAdi=isset($_POST['kategoriAdi']) ? $_POST['kategoriAdi']:null;

        if (!$kategoriAdi)
        {
            $hata="Lütfen bir veri giriniz!!!";
        }
        else
        {
            $sorgu=$db->prepare('UPDATE kategori SET Adi=? WHERE Id='.$_GET['id']);
            $guncelle=$sorgu->execute([$kategoriAdi]);
            if($guncelle)
            {
                $hata="'".$kategoriAdi."'"." başarılı bir şekilde güncellendi...";
                header("Location:index.php");

            }
            else{
                $hata="Veri Tabanına veri Eklenemedi!!!";
            }
        }


    }

?>
    <a href="index.php" class="btn btn-primary float-right mb-3 mr-3">Anasayfaya Dön</a>
    <h1 class="display-5 mb-4">Kategori Güncelle</h1>
    <?php if (isset($hata)){
        echo "<div class='alert alert-success'>".$hata."</div>";
    }
    ?>

    <form method="post">
    <div class="form-group">
        <div class="col-md-2"><label class="font">Kategori Adı</label></div>
        <div class="col-lg-offset-0 col-md-12"><input type="text" name="kategoriAdi" class="form-control" value="<?php if (isset($_GET['id']) && !isset($_POST['submit'])){ echo $kategori['Adi'];} ?>"></div>
    </div>

    <div class="form-group">
        <input type="hidden" name="submit" value="1">
        <div class="col-lg-offset-0 col-md-12"><button type="submit" class="btn btn-success offset-5">Kategori Güncelle</button></div>
    </div>
    </form>


<?php
include('../php/footer.php');
?>