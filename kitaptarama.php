<?php
include "php/meta.php";
include "php/header.php";
require_once 'baglan.php';
?>
<?php

    $sorgu1=$db->prepare('SELECT * FROM yazarlar');
    $sorgu1->execute();
    $yazar1=$sorgu1->fetchAll(PDO::FETCH_ASSOC);



if(isset($_GET['submit'])){
    $hata=null;
    $kitapadi=isset($_GET['kitapadi']) ? $_GET['kitapadi']:null;
    $yazar=isset($_GET['yazar']) ? $_GET['yazar']:null;

    if ($kitapadi==null){
        $hata="Lütfen kitap adını giriniz !!!";
    }
    elseif ($yazar==null){
        $hata="Lütfen yazar adını giriniz !!!";
    }
    elseif ($kitapadi==null && $yazar==""){
        $hata="Lütfen kitap adı ve yazar adını giriniz";
    }
    else{

        $sorgu=$db->prepare('SELECT kitaplar.id,kitaplar.Adi,kitaplar.Sayfa_Sayisi,kitaplar.ISBN,kitaplar.LC,yazarlar.Adi AS yazarAdi,yazarlar.Soyadi AS yazarSoyadi,kategori.Adi AS kategoriAdi,yayinevi.Adi AS yayineviAdi
                                       FROM kitaplar,yazarlar,kategori,yayinevi WHERE yazarlar.Id=kitaplar.Yazar_Id AND kitaplar.Adi=? AND kitaplar.Yazar_Id=? AND kitaplar.Kategori_Id=kategori.Id AND 
                                       kitaplar.YayinEvi_Id=yayinevi.Id');
        $sorgu->execute([$kitapadi,$yazar]);
        $kitap1=$sorgu->fetchAll(PDO::FETCH_ASSOC);
    }
}
    ?>





<div class="container mt-5 mb-5">
    <?php
    if (isset($_GET['submit'])){
        if ($hata!=null){
            echo "<label class='alert alert-success col-md-12'><strong>".$hata."</strong></label>";
        }
    }

    ?>
    <form method="get">
<div class="card">
    <div class="card-header bg-warning text-center">Kitap Arama</div>
    <div class="card-body">
        <div class="container">
           <div class="row">
               <div class="col-6 mt-4 mb-4">
                <div class="form-group">
                    <label class="label mb-2">Kitap Adi:</label>
                    <input type="text" class="form-control mb-2" name="kitapadi"  value="<?php if (isset($_GET['submit'])){ echo $kitapadi;}?>">
                </div>
            </div>
               <div class="col-6 mt-4 mb-4">
                   <div class="form-group">
                       <label class="label mb-2">Yazar:</label>
                       <select name="yazar"  class="form-control">
                           <option value="">---Seçim Yapınız---</option>
                           <?php foreach ($yazar1 as $yazarlar ):?>
                           <option value="<?php echo $yazarlar['Id']?>"><?php echo $yazarlar['Adi']." ".$yazarlar['Soyadi']?></option>
                           <?php endforeach;?>
                       </select>
                   </div>
            </div>
           </div>
        </div>
    </div>
    <div class="card-footer text-center">
        <input type="hidden" name="submit" value="1">
        <button type="submit" class="btn btn-dark col-md-3 mt-2 mb-2">Ara</button>
    </div>
</div>
    </form>
</div>


<?php
    if(isset($_GET['submit'])){
        if ($kitapadi==null || $yazar==null)
        {
            $hata=null;
        }
        elseif ($kitapadi && $yazar && empty($kitap1))
        {
            echo "<label class='alert alert-danger col-md-6 offset-md-3 text-center mb-5 text-dark'><strong>Kütüphanede Böyle Bir Kitap yoktur</strong></label>";
        }

        else{
?>
<div class="container">
    <table class="table ">
        <thead>
        <tr>
            <th>#</th>
            <th>Kitap Adı</th>
            <th>Yazar Adı</th>
            <th>Sayfa Sayısı</th>
            <th>Kategori</th>
            <th>ISBN</th>
            <th>Yayın Evi</th>
            <th>Raf Kodu</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <?php

                foreach ($kitap1 as $kitap):?>
                    <tr>
                        <th scope="row"><?php echo $kitap['id']?></th>
                        <td><?php echo $kitap['Adi']?></td>
                        <td><?php echo $kitap['yazarAdi']." ".$kitap['yazarSoyadi'];?></td>
                        <td><?php echo $kitap['Sayfa_Sayisi']?></td>
                        <td><?php echo $kitap['kategoriAdi']?></td>
                        <td><?php echo $kitap['ISBN']?></td>
                        <td><?php echo $kitap['yayineviAdi']?></td>
                        <td><?php echo $kitap['LC']?></td>
                        <td><a href="detay.php?id=<?php echo $kitap['id'];?>" class="btn btn-primary col-12 text-center text-white">Detay</a></td>
                    </tr>
                <?php endforeach;}}
                ?>
        </tbody>

    </table>

</div>




<?php
include "php/footer.php";
include "php/end.php";
?>
