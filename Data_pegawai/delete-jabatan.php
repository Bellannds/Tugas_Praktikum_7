<?php include('config/constants.php') ?>
<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "delete from jabatan where id = '$id'";
    $res = mysqli_query($conn, $sql);
    if ($res) {
        header('location:' . SITEURL . '/daftar-jabatan.php');
    }
}
?>