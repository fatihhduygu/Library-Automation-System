<?php
include "php/meta.php";
include "php/header.php";
require_once 'baglan.php';
?>


<?php
if (isset($_GET['submit'])) {
    $isbn = isset($_GET['isbn']) ? $_GET['isbn'] : null;

    if (!$isbn) {
        $hata = "Lütfen ISBN numarasını giriniz";
    }

    else {
        $sorgu=$db->prepare('SELECT kitaplar.id,kitaplar.Adi AS kitapAdi,yazarlar.Adi,yazarlar.soyadi,kitaplar.Sayfa_Sayisi,kitaplar.Yayin_Tarihi,kitaplar.ISBN,kitaplar.LC,kategori.Adi AS kategoriAdi FROM kitaplar,yazarlar,kategori WHERE yazarlar.Id=kitaplar.Yazar_Id AND kategori.Id=kitaplar.Kategori_Id AND kitaplar.ISBN=?');
        $sorgu->execute([$isbn]);
        $kitaplar=$sorgu->fetchAll(PDO::FETCH_ASSOC);
        $hata=null;
    }
}
?>



<div class="container mt-5 mb-5 col-md-8 col-sm-12">
    <?php
    if (isset($_GET['submit']))
    {
        if ($hata!=null)
        {
            echo  "<label class='alert alert-primary col-md-12 mt-2'><strong>".$hata."</strong></label>";
        }

    }
    ?>
    <form method="get">
        <div class="card">
            <div class="card-header bg-warning text-center">ISBN/ISSN/ISMN Numarası İle Kitap Arama</div>
            <div class="card-body">
                <div class="container">
                    <div class="row">
                        <div class="col-12 mt-2 mb-4">
                            <div class="form-group">
                                <label class="label mb-2">ISBN/ISSN/ISMN NO:</label>
                                <input type="text" class="form-control mb-2" name="isbn">
                                <input type="hidden" value="1" name="submit">
                                <button type="submit" class="btn btn-dark col-md-3 mt-4 text-center offset-4">Ara</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </form>
</div>



    <?php if(isset($_GET['submit'])){
    if (!$isbn)
    {
        $hata = "null";
    }

    elseif ($isbn && empty($kitaplar)){
        echo "<label class='alert alert-danger col-md-6 offset-md-3 text-center mb-5 text-dark'><strong>Kütüphanede Böyle Bir Kitap yoktur</strong></label>";
    }
    else{
    ?>
    <div class="container mb-5">
        <table class="table ">
            <thead>
            <tr>
                <th>#</th>
                <th>Kitap Adı</th>
                <th>Yazar Adı</th>
                <th>Sayfa Sayısı</th>
                <th>Kategori Adı</th>
                <th>ISBN</th>
                <th>Raf Kodu</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <?php
        foreach ($kitaplar as $kitap):?>
        <tr>
            <th scope="row"><?php echo $kitap['id']?></th>
            <td><?php echo $kitap['kitapAdi']?></td>
            <td><?php echo $kitap['Adi']." ".$kitap['soyadi'];?></td>
            <td><?php echo $kitap['Sayfa_Sayisi']?></td>
            <td><?php echo $kitap['kategoriAdi']?></td>
            <td><?php echo $kitap['ISBN']?></td>
            <td><?php echo $kitap['LC']?></td>
            <td><a href="detay.php?id=<?php echo $kitap['id'];?>" class="btn btn-primary col-12 text-center text-white">Detay</a></td>
        </tr>
        <?php endforeach;}}?>
        </tbody>

    </table>

    </div>








<?php
include "php/footer.php";
include "php/end.php";
?>
