<?php
include('../php/header.php');
require_once '../../baglan.php';
$sorgu=$db->prepare('SELECT * FROM uyeler');
$sorgu->execute();
$uyeler=$sorgu->fetchAll(PDO::FETCH_ASSOC);

if (isset($_GET['deleteId']))
{
    $sorgu=$db->prepare('DELETE FROM uyeler WHERE id=?');
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

    <h1 class="display-5 mb-4">Üyeler</h1>
<?php if (isset($hata)){
    echo "<div class='alert alert-warning'>".$hata."</div>";
}
?>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Ad</th>
            <th scope="col">Soyad</th>
            <th scope="col">Tc</th>
            <th scope="col">Doğum Tarihi</th>
            <th scope="col">Cinsiyet</th>
            <th scope="col">Telefon</th>
            <th scope="col">Email</th>
            <th scope="col">Kimlik</th>
            <th scope="col">Adres</th>
            <th scope="col">Operations</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($uyeler as $uye):?>
            <tr>
                <th scope="row"><?php echo $uye['Id'] ?></th>
                <td><?php echo $uye['Adi'] ?></td>
                <td><?php echo $uye['Soyadi'] ?></td>
                <td><?php echo $uye['Tc'] ?></td>
                <td><?php echo $uye['Dogum_Tarihi'] ?></td>
                <td><?php echo $uye['Cinsiyet'] ?></td>
                <td><?php echo $uye['Tel'] ?></td>
                <td><?php echo $uye['Email'] ?></td>
                <td><?php echo $uye['Kimlik'] ?></td>
                <td><?php echo $uye['Adres'] ?></td>
                <td>
                    <a href="update.php?id=<?php echo $uye['Id']; ?>" class="btn btn-primary mb-1">Update</a>
                    <a href="index.php?deleteId=<?php echo $uye['Id']; ?>" class="btn btn-danger  mb-1">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
<?php
include('../php/footer.php');
?>