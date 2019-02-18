<?php
include "php/meta.php";
include "php/header.php";
require_once 'baglan.php';

    $kategori_id=$_GET['kategoriid'];
    if (isset($kategori_id))
    {
        if ($kategori_id==1)
        {
            $sorgu=$db->prepare('SELECT kitaplar.id,kitaplar.Adi,kitaplar.resim,yazarlar.Adi AS yazarAdi,yazarlar.Soyadi AS yazarSoyadi FROM kitaplar,yazarlar WHERE yazarlar.Id=kitaplar.Yazar_Id');
            $sorgu->execute();
            $kitaplar=$sorgu->fetchAll(PDO::FETCH_ASSOC);
        }
        else {
            $sorgu = $db->prepare('SELECT kitaplar.id,kitaplar.Adi,kitaplar.resim,yazarlar.Adi AS yazarAdi,yazarlar.Soyadi AS yazarSoyadi FROM kitaplar,yazarlar WHERE yazarlar.Id=kitaplar.Yazar_Id AND Kategori_Id=?');
            $sorgu->execute([$kategori_id]);
            $kitaplar = $sorgu->fetchAll(PDO::FETCH_ASSOC);
        }

    }
    if ($kategori_id==null ){
        header("Location: 404.php");
    }


?>

<div class="container col-md-11 offset-1">
<div class="h3 offset-5 mt-3 mb-4" style="font-family:Courier New,monospace; font-size:2.5em">Kitap Kategori</div>
    <hr class="col-md-10 mt-3 mb-4">
    <div class="row ml-3">
        <a href="kategoriarama.php?kategoriid=1" class="btn btn-outline-info col-md-1 mt-3 mb-2 ml-2 active ">Kitap</a>
        <a href="kategoriarama.php?kategoriid=2" class="btn btn-outline-info col-md-1 mt-3 mb-2 ml-4">Edebiyat</a>
        <a href="kategoriarama.php?kategoriid=3" class="btn btn-outline-info col-md-1 mt-3 mb-2 ml-4">Çocuk Ve Gençlik</a>
        <a href="kategoriarama.php?kategoriid=4" class="btn btn-outline-info col-md-2 mt-3 mb-2 ml-4">Eğitim</a>
        <a href="kategoriarama.php?kategoriid=5" class="btn btn-outline-info col-md-2 mt-3 mb-2 ml-4">Araştırma-Tarih</a>
        <a href="kategoriarama.php?kategoriid=6" class="btn btn-outline-info col-md-2 mt-3 mb-2 ml-4">Din-Mitoloji</a>



    </div>
    <div class="row ml-5">
        <a href="kategoriarama.php?kategoriid=7" class="btn btn-outline-info col-md-2 mt-3 mb-2 ml-2">Foreign Languages</a>
        <a href="kategoriarama.php?kategoriid=8" class="btn btn-outline-info col-md-2 mt-3 mb-2 ml-4 ">Sanat-Tasarım</a>
        <a href="kategoriarama.php?kategoriid=9" class="btn btn-outline-info col-md-2 mt-3 mb-2 ml-4">Felsefe</a>
        <a href="kategoriarama.php?kategoriid=10" class="btn btn-outline-info col-md-1 mt-3 mb-2 ml-4">Hobi</a>
        <a href="kategoriarama.php?kategoriid=11" class="btn btn-outline-info col-md-1 mt-3 mb-2 ml-4">Çizgi Roman</a>

    </div>
    <div class="row ml-3">
        <a href="kategoriarama.php?kategoriid=12" class="btn btn-outline-info col-md-1 mt-3 mb-2 ml-2 ">Bilim</a>
        <a href="kategoriarama.php?kategoriid=13" class="btn btn-outline-info col-md-1 mt-3 mb-2 ml-4">Mizah</a>
        <a href="kategoriarama.php?kategoriid=14" class="btn btn-outline-info col-md-2 mt-3 mb-2 ml-4">Prestij Kitapları</a>
        <a href="kategoriarama.php?kategoriid=15" class="btn btn-outline-info col-md-1 mt-3 mb-2 ml-4">Spor</a>
        <a href="kategoriarama.php?kategoriid=16" class="btn btn-outline-info col-md-2 mt-3 mb-2 ml-4">Diğer</a>
    </div>
    <hr class="col-md-10 mt-5 mb-5">

</div>



<div class="container mb-5">
    <div class="row">
        <div class="container">
            <div class="row">
                <?php foreach ($kitaplar as $kitap):?>
                <div class="col-md-3 mt-2 text-center">
                    <div class="card mb">
                        <img class="card-img-top" src="kitapimages/<?php echo $kitap['resim']?>" width="383" height="350" alt="Card image cap">
                        <div class="card-body mb">
                            <h5 class="card-title"><?php echo $kitap['Adi'];?></h5>
                            <p class="card-text"><?php echo $kitap['yazarAdi']." ".$kitap['yazarSoyadi'];?></p>
                            <a href="detay.php?id=<?php echo $kitap['id'];?>"class="btn btn-outline-dark mb col-md-9">Detay</a>
                        </div>
                    </div>
                </div>
                <?php endforeach;?>
            </div>
        </div>
    </div>
</div>



<?php
include "php/footer.php";
include "php/end.php";

?>
