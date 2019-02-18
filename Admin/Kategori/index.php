<?php
include('../php/header.php');
require_once '../../baglan.php';
$sorgu=$db->prepare('SELECT * FROM kategori');
$sorgu->execute();
$kategoriler=$sorgu->fetchAll(PDO::FETCH_ASSOC);

if (isset($_GET['deleteId']))
{
    $sorgu=$db->prepare('DELETE FROM kategori WHERE Id=?');
    $delete=$sorgu->execute([$_GET['deleteId']]);
    if($delete)
    {
        header("Location: index.php");
    }
    else{
        $hata="Kategoriyi veri tabanından silmeden önce lütfen kategoriye ait kitapları siliniz !!!";
    }
}


?>

    <h1 class="display-5 mb-4">Kategoriler</h1>
    <a href="insert.php" class="btn btn-success float-right mb-3">Kategori Ekle</a>
<?php if (isset($hata)){
    echo "<div class='alert alert-warning'>".$hata."</div>";
}
?>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Kaegori Adı</th>
            <th scope="col">Operations</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($kategoriler as $kategori):?>
            <tr>
                <th scope="row"><?php echo $kategori['Id'] ?></th>
                <td><?php echo $kategori['Adi'] ?></td>
                <td>
                    <a href="update.php?id=<?php echo $kategori['Id']; ?>" class="btn btn-primary mb-1">Update</a>
                    <a href="index.php?deleteId=<?php echo $kategori['Id']; ?>" class="btn btn-danger mb-1">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
<?php
include('../php/footer.php');
?>