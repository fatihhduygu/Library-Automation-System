<?php
include('../php/header.php');
require_once '../../baglan.php';
    $sorgu=$db->prepare('SELECT kitaplar.id,kitaplar.Adi,kitaplar.Sayfa_Sayisi,kitaplar.Yayin_Tarihi,kitaplar.ISBN,kitaplar.LC, yazarlar.Adi AS yazarAdi,yazarlar.Soyadi AS yazarSoyadi,kategori.Adi AS kategoriAdi,
                                   yayinevi.Adi AS yayinEvi 
                                   FROM kitaplar,yazarlar,kategori,yayinevi WHERE kitaplar.Yazar_Id=yazarlar.Id AND kitaplar.Kategori_Id=kategori.Id AND yayinevi.Id=kitaplar.YayinEvi_Id ORDER BY kitaplar.id ');
    $sorgu->execute();
    $kitaplar=$sorgu->fetchAll(PDO::FETCH_ASSOC);

    if (isset($_GET['deleteId']))
    {
        $sorgu=$db->prepare('DELETE FROM kitaplar WHERE id=?');
        $delete=$sorgu->execute([$_GET['deleteId']]);
        if($delete)
        {
            header("Location: index.php");
        }
        else{
            $hata="Veri Tabanından silinemedi !!!";
        }
    }


    ?>

<h1 class="display-5 mb-4">Kitap</h1>
    <a href="insert.php" class="btn btn-success float-right mb-3">Kitap Ekle</a>
<?php if (isset($hata)){
    echo "<div class='alert alert-warning'>".$hata."</div>";
}
?>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Ad</th>
      <th scope="col">Sayfa Sayisi</th>
      <th scope="col">Yayın Tarihi</th>
      <th scope="col">ISBN</th>
      <th scope="col">Yazar Adı</th>
      <th scope="col">YayınEvi_Id</th>
      <th scope="col">Kategori Adı</th>
      <th scope="col">Raf Kodu</th>
      <th scope="col">Operation</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach ($kitaplar as $kitap):?>
    <tr>
      <th scope="row"><?php echo $kitap['id'] ?></th>
      <td><?php echo $kitap['Adi'] ?></td>
      <td><?php echo $kitap['Sayfa_Sayisi'] ?></td>
      <td><?php echo $kitap['Yayin_Tarihi'] ?></td>
      <td><?php echo $kitap['ISBN'] ?></td>
      <td><?php echo $kitap['yazarAdi']." ".$kitap['yazarSoyadi'] ?></td>
      <td><?php echo $kitap['yayinEvi'] ?></td>
      <td><?php echo $kitap['kategoriAdi'] ?></td>
      <td><?php echo $kitap['LC'] ?></td>
      <td>
      <a href="update.php?id=<?php echo $kitap['id']?>" class="btn btn-primary mb-1">Update</a>
      <a href="index.php?deleteId=<?php echo $kitap['id']; ?>" class="btn btn-danger mb-1">Delete</a>
      </td>
    </tr>
  <?php endforeach; ?>
  </tbody>
</table>
<?php
include('../php/footer.php');
?>