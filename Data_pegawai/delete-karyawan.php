<?php include('config/constants.php') ?>
<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "delete from karyawan where id = '$id'";
    $res = mysqli_query($conn, $sql);
    if ($res) {
        header('location:' . SITEURL . '/index.php');
    }
}
?>