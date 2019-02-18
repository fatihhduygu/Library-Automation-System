<?php
include('../php/header.php');
require_once '../../baglan.php';
$sorgu=$db->prepare('SELECT * FROM yazarlar');
$sorgu->execute();
$yazarlar=$sorgu->fetchAll(PDO::FETCH_ASSOC);

if (isset($_GET['deleteId']))
{
    $sorgu=$db->prepare('DELETE FROM yazarlar WHERE Id=?');
    $delete=$sorgu->execute([$_GET['deleteId']]);
    if($delete)
    {
        header("Location: index.php");
    }
    else{
        $hata="Yazarı veri tabanından silmeden önce lütfen yazara ait kitapları siliniz !!!";
    }
}



?>

    <a href="insert.php" class="btn btn-success float-right mb-3">Yazar Ekle</a>
    <h1 class="display-5 mb-4">Yazarlar</h1>
<?php if (isset($hata)){
    echo "<div class='alert alert-warning'><strong>".$hata."</strong></div>";
}
?>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Ad</th>
            <th scope="col">Soyadi</th>
            <th scope="col">Operations</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($yazarlar as $yazar):?>
            <tr>
                <th scope="row"><?php echo $yazar['Id'] ?></th>
                <td><?php echo $yazar['Adi'] ?></td>
                <td><?php echo $yazar['Soyadi'] ?></td>
                <td>
                    <a href="update.php?id=<?php echo $yazar['Id'];?>" class="btn btn-primary mb-1">Update</a>
                    <a href="index.php?deleteId=<?php echo $yazar['Id'];?>" class="btn btn-danger mb-1">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
<?php
include('../php/footer.php');
?>