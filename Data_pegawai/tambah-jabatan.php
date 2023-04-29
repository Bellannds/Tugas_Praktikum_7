<?php include('config/constants.php') ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Jabatan</title>
</head>

<body style="background-color: #F3E8FF;">
    <button onclick="location.href='tambah-karyawan.php'"
        style="margin-top: 1rem; margin-right: 20px; background-color: #B46060; color: white; padding: 10px 20px; border: none; cursor: pointer;">Kembali</button>
    <form method="post" style="margin-top: 1rem;">
        <input type="text" name="name_jabatan" placeholder="nama jabatan">
        <input style="background-color: #4D4D4D; margin-left: 20px; border: none; padding: 5px 10px; font-weight: bold; color: #FFFFFF;" type="submit" value="Submit" name="submit">
    </form>
</body>

</html>
<?php
if (isset($_POST['submit'])) {
    $name = htmlspecialchars($_POST['name_jabatan']);

    $insertJabatanSql = "insert into jabatan (name) values('$name')";
    $resultInsertJabatan = mysqli_query($conn, $insertJabatanSql);
    if ($resultInsertJabatan) {
        header('location:' . SITEURL . '/daftar-jabatan.php');
    }
}
?>