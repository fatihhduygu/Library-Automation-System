<?php
include('../php/header.php');
require_once '../../baglan.php';

    if(isset($_POST['submit'])){
        $kategoriAdi=isset($_POST['kategoriAdi']) ? $_POST['kategoriAdi']:null;

        if (!$kategoriAdi)
        {
            $hata="Lütfen bir veri giriniz!!!";
        }
        else
        {
            $sorgu=$db->prepare('INSERT INTO kategori SET  Adi=?');
            $ekle=$sorgu->execute([$kategoriAdi]);
            if($ekle)
            {
                $hata="'".$kategoriAdi."'"." başarılı bir şekilde eklendi...";
                $kategoriAdi=null;

            }
            else{
                $hata="Veri Tabanına veri Eklenemedi!!!";
            }
        }


    }

?>
    <a href="index.php" class="btn btn-primary float-right mb-3 mr-3">Anasayfaya Dön</a>
    <h1 class="display-5 mb-4">Kategori Ekle</h1>
    <?php if (isset($hata)){
        echo "<div class='alert alert-success'>".$hata."</div>";
    }
    ?>

    <form method="post">
    <div class="form-group">
        <div class="col-md-2"><label class="font">Kategori Adı</label></div>
        <div class="col-lg-offset-0 col-md-12"><input type="text" name="kategoriAdi" class="form-control"></div>
    </div>

    <div class="form-group">
        <input type="hidden" name="submit" value="1">
        <div class="col-lg-offset-0 col-md-12"><button type="submit" class="btn btn-success offset-5">Kategori Ekle</button></div>
    </div>
    </form>


<?php
include('../php/footer.php');
?>