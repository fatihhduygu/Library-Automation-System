<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>

  <meta charset="UTF-8">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="../../css/bootstrap.css">
  <link rel="stylesheet" href="../../css/admin.css" type="text/css">
    

</head>
<body>

<?php
if (!$_SESSION['Kimlik'])
{
    header('Location:/index.php');
}
?>
<nav class="navbar navbar-light bg-secondary justify-content-between">
  <a class="navbar-brand">Navbar</a>
  <div class="float-right">
    <span class="text-white mr-3"><?php echo $_SESSION['Adi']." ".$_SESSION['Soyadi'];?></span>
    <a href="../cikis.php" class="btn btn-light">Çıkış</a>
  </div>
</nav>
<div class="container col-md-12">
  <div class="row">
    <div class="col-md-2">
      <div class="sidebar">
        <span class="text-light text-center offset-2 font-weight-bold mt-5" style="font-size: 30px;">Admin Panel</span>
        <a href="../Islem/index.php" class="active"><i class="fa fa-fw fa-home fa-3x"></i> Anasayfa</a>
        <a href="../Kitap/index.php" class="active"><i class="fa fa-fw fa-book fa-3x"></i> Kitap İşlemleri</a>
        <a href="../Yazar/index.php"><i class="fa fa-fw fa-user fa-3x"></i> Yazar İşlemleri</a>
        <a href="../Uye/index.php"><i class="fa fa-fw fa-address-card-o fa-3x"></i> Üye İşlemleri</a>
        <a href="../Yayinevi/index.php"><i class="fa fa-fw fa-file-text fa-3x"></i> YayinEvi İşlemleri</a>
        <a href="../Kategori/index.php"><i class="fa fa-fw fa-table fa-3x"></i> Kategori İşlemleri</a>
      </div>
    </div>
    <div class="col-md-9 bg-white mt-5 p-5 ml-5">