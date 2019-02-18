<?php
include('../php/header.php');
require_once '../../baglan.php';
$sorgu=$db->prepare('SELECT * FROM yayinevi');
$sorgu->execute();
$yayinevleri=$sorgu->fetchAll(PDO::FETCH_ASSOC);

if (isset($_GET['deleteId']))
{
    $sorgu=$db->prepare('DELETE FROM yayinevi WHERE Id=?');
    $delete=$sorgu->execute([$_GET['deleteId']]);
    if($delete)
    {
        header("Location: index.php");
    }
    else{
        $hata="Yayınevini veri tabanından silmeden önce lütfen yayınevine ait kitapları siliniz !!!";
    }
}

?>

    <a href="insert.php" class="btn btn-success float-right mb-3">Yayın Evi Ekle</a>
    <h1 class="display-5 mb-4">Yayın Evleri</h1>
<?php if (isset($hata)){
    echo "<div class='alert alert-warning'>".$hata."</div>";
}
?>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Adi</th>
            <th scope="col">Telefon</th>
            <th scope="col">Email</th>
            <th scope="col">Adres</th>
            <th scope="col">Domain</th>
            <th scope="col">Operation</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($yayinevleri as $yayinevi):?>
            <tr>
                <th scope="row"><?php echo $yayinevi['Id'] ?></th>
                <td><?php echo $yayinevi['Adi'] ?></td>
                <td><?php echo $yayinevi['Tel'] ?></td>
                <td><?php echo $yayinevi['Email'] ?></td>
                <td><?php echo $yayinevi['Adres'] ?></td>
                <td><?php echo $yayinevi['Domain'] ?></td>

                <td>
                    <a href="update.php?id=<?php echo $yayinevi['Id']; ?>" class="btn btn-primary mb-1">Update</a>
                    <a href="index.php?deleteId=<?php echo $yayinevi['Id']; ?>" class="btn btn-danger mb-1">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
<?php
include('../php/footer.php');
?>