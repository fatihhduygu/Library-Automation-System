<?php
include "php/meta.php";
include "php/header.php";
require_once 'baglan.php';

$id=$_GET['id'];
if ($id==null)
{
    header("Location: 404.php");
}
else{
    $sorgu=$db->prepare('SELECT kitaplar.Adi,kitaplar.Sayfa_Sayisi,kitaplar.icerik,kitaplar.resim,kitaplar.LC,yazarlar.Adi AS yazarAdi,yazarlar.Soyadi AS yazarSoyadi,yayinevi.Adi AS yayinEvi FROM kitaplar,yazarlar,yayinevi
                                   where yazarlar.Id=kitaplar.Yazar_ID AND kitaplar.id=? AND yayinevi.Id=kitaplar.YayinEvi_Id');
    $sorgu->execute([$id]);
    $kitap=$sorgu->fetch(PDO::FETCH_ASSOC);
}

if ($kitap['Adi']==null)
{
    header("Location: 404.php");
}




?>
<hr class="col-8">

<div class="container mt-5 mb-5">
<div class="row" style="margin-top:30px;">
    <div class="col-md-5 col-sm-3"><img src="kitapimages/<?php echo $kitap['resim'];?>" width="380" height="550" /></div>
    <div class="col-md-7 col-sm-5">
        <h1><?php echo $kitap['Adi']?></h1>
        <strong class="d-block mt-1"><span class="text-secondary">Yazar: </span> <?php echo $kitap['yazarAdi']." ".$kitap['yazarSoyadi'];?></strong>
        <strong class="d-block mt-1"><span class="text-secondary">YayinEvi: </span><?php echo $kitap['yayinEvi']?></strong>
        <strong class="d-block mt-1"><span class="text-secondary">Sayfa Sayisi:</span> <?php echo $kitap['Sayfa_Sayisi']?></strong>
        <strong class="d-block mt-1"><span class="text-secondary">Raf Kodu: </span><?php echo $kitap['LC']?></strong>
        <p class="mt-4"><?php echo $kitap['icerik']?></p>
    </div>
</div>
</div>
<div class="mt-5 mb-5">.</div>

<?php
include "php/footer.php";
include "php/end.php";
?>