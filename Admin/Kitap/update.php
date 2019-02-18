<?php
include('../php/header.php');
require_once '../../baglan.php';

    $sorgu1=$db->prepare('SELECT Id,Adi FROM yayinevi');
    $sorgu2=$db->prepare('SELECT * FROM yazarlar');
    $sorgu3=$db->prepare('SELECT * FROM kategori');
    $sorgu1->execute();
    $sorgu2->execute();
    $sorgu3->execute();
    $yayinevleri=$sorgu1->fetchAll(PDO::FETCH_ASSOC);
    $yazarlar=$sorgu2->fetchAll(PDO::FETCH_ASSOC);
    $kategoriler=$sorgu3->fetchAll(PDO::FETCH_ASSOC);

    if(isset($_GET['id']))
    {
        $sorgu=$db->prepare('SELECT * FROM kitaplar where id=?');
        $sorgu->execute([$_GET['id']]);
        $kitap=$sorgu->fetch(PDO::FETCH_ASSOC);
    }



    if(isset($_POST['submit']))
    {
        $kitapAdi=isset($_POST['kitapAdi']) ? $_POST['kitapAdi']:null;
        $sayfaSayisi=isset($_POST['sayfaSayisi']) ? $_POST['sayfaSayisi']:null;
        $yayinTarihi=isset($_POST['yayinTarihi']) ? $_POST['yayinTarihi']:null;
        $isbn=isset($_POST['isbn']) ? $_POST['isbn']:null;
        $yayinEvi=isset($_POST['yayinEvi']) ? $_POST['yayinEvi']:null;
        $yazar=isset($_POST['yazar']) ? $_POST['yazar']:null;
        $kategori=isset($_POST['kategori']) ? $_POST['kategori']:null;
        $resim=isset($_POST['resim']) ? $_POST['resim']:null;
        $icerik=isset($_POST['icerik']) ? $_POST['icerik']:null;



        if (!$kitapAdi or !$sayfaSayisi or !$yayinTarihi or !$isbn or !$yayinEvi or !$yazar or !$kategori or !$resim or !$icerik)
        {
            $hata="<strong> Lütfen boş alanları doldurunuz!!!</strong>";
        }
        else{
            $sorgu4=$db->prepare('UPDATE kitaplar SET
              Adi=?,
              Sayfa_Sayisi=?,
              Yayin_Tarihi=?,
              ISBN=?,
              YayinEvi_Id=?,
              Yazar_Id=?,
              Kategori_Id=?,
              Kutuphane_Id=?,
              resim=?,
              icerik=? WHERE id='.$_GET['id'].';' );
            $guncelle=$sorgu4->execute([$kitapAdi,$sayfaSayisi,$yayinTarihi,$isbn,$yayinEvi,$yazar,$kategori,1,$resim,$icerik]);

            if ($guncelle)
            {
                $hata="Veriler başarılı bir şekilde güncellendi";
                header("Location:index.php");
            }
            else
            {
                $hata="veriler kaydedilemedi";
            }

        }

    }
    ?>
    <a href="index.php" class="btn btn-primary float-right mb-3 mr-3">Anasayfaya Dön</a>
<h1 class="display-5 mb-4">Kitap Güncelle</h1>
<?php if (isset($hata)){
    echo "<div class='alert alert-warning'>".$hata."</div>";
}
?>
    <form method="post">
        <div class="form-group">
            <div class="col-md-2"><label class="font">Kitap Adı</label></div>
            <div class="col-lg-offset-0 col-md-12"><input type="text" name="kitapAdi" class="form-control" value="<?php if (isset($_POST['submit'])){echo $kitapAdi;} if (isset($_GET['id']) && !isset($_POST['submit'])){ echo $kitap['Adi'];}?>"></div>
        </div>


        <div class="form-group">
            <div class="col-md-2"><label class="font">Sayfa Sayısı</label></div>
            <div class="col-lg-offset-0 col-md-12"><input type="text" name="sayfaSayisi" class="form-control" value="<?php if (isset($_POST['submit'])){echo $sayfaSayisi;} if (isset($_GET['id']) && !isset($_POST['submit'])){ echo $kitap['Sayfa_Sayisi'];}?>"></div>
        </div>

        <div class="form-group">
            <div class="col-md-2"><label class="font">Yayın Tarihi</label></div>
            <div class="col-lg-offset-0 col-md-12"><input type="date" name="yayinTarihi" class="form-control" value="<?php if (isset($_POST['submit'])){echo $yayinTarihi;} if (isset($_GET['id']) && !isset($_POST['submit'])){ echo $kitap['Yayin_Tarihi'];}?>"></div>
        </div>

        <div class="form-group">
            <div class="col-md-2"><label class="font">ISBN</label></div>
            <div class="col-lg-offset-0 col-md-12"><input type="text" name="isbn" class="form-control" value="<?php if (isset($_POST['submit'])){echo $isbn;} if (isset($_GET['id']) && !isset($_POST['submit'])){ echo $kitap['ISBN'];}?>"></div>
        </div>

        <div class="form-group">
            <div class="col-md-2"><label class="font">Yayın Evi</label></div>
            <div class="col-lg-offset-0 col-md-12">
                <select name="yayinEvi" class="form-control">
                    <option value="">---Seçim Yapınız---</option>
                    <?php foreach ($yayinevleri as $yayinevi):?>
                    <option value="<?php echo $yayinevi['Id']?>" ><?php echo $yayinevi['Adi']; ?></option>
                    <?php endforeach;?>
                </select>
            </div>
        </div>


        <div class="form-group">
            <div class="col-md-2"><label class="font">Yazar Adı</label></div>
            <div class="col-lg-offset-0 col-md-12">
                <select name="yazar" class="form-control">
                    <option value="">---Seçim Yapınız---</option>
                    <?php foreach ($yazarlar as $yazar):?>
                        <option value="<?php echo $yazar['Id']?>"><?php echo $yazar['Adi']." ".$yazar['Soyadi']; ?></option>
                    <?php endforeach;?>
                </select>
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-2"><label class="font">Kategori Adı</label></div>
            <div class="col-lg-offset-0 col-md-12">
                <select name="kategori" class="form-control">
                    <option value="">---Seçim Yapınız---</option>
                    <?php foreach ($kategoriler as $kategori):?>
                        <option value="<?php echo $kategori['Id']?>"><?php echo $kategori['Adi']; ?></option>
                    <?php endforeach;?>
                </select>


            </div>
        </div>
        <div class="form-group">
            <div class="col-md-2"><label class="font">Resim Url</label></div>
            <div class="col-lg-offset-0 col-md-12"><input type="text" name="resim" class="form-control" value="<?php if (isset($_POST['submit'])){echo $resim;} if (isset($_GET['id']) && !isset($_POST['submit'])){ echo $kitap['resim'];}?>"></div>
        </div>

        <div class="form-group">
            <div class="col-md-2"><label class="font">İçerik</label></div>
            <div class="col-lg-offset-0 col-md-12"><textarea name="icerik" class="form-control" rows="8"><?php if (isset($_POST['submit'])){echo $icerik;} if (isset($_GET['id']) && !isset($_POST['submit'])){ echo $kitap['icerik'];}?></textarea></div>
        </div>

        <div class="form-group">
            <input type="hidden" name="submit" value="1">
            <div class="col-lg-offset-0 col-md-12"><button type="submit" class="btn btn-success offset-5">Kitap Güncelle</button></div>
        </div>


    </form>


<?php
include('../php/footer.php');
?>