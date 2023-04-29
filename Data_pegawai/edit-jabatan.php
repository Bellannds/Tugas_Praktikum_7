<?php include('config/constants.php') ?>

<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "select name from jabatan where id = '$id'";
    $res = mysqli_query($conn, $sql);
    if ($res) {
        $data = mysqli_fetch_assoc($res);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Jabatan</title>
</head>

<body style="background-color: #F3E8FF;">
    <form method="post">
        <input type="text" name="name_jabatan" placeholder="Nama Jabatan" value="<?php echo $data['name'] ?>">
        <input type="submit" value="Submit" name="submit">
    </form>
</body>

</html>

<?php
if (isset($_POST['submit'])) {
    $name = htmlspecialchars($_POST['name_jabatan']);

    $sql = "update jabatan set name = '$name' where id = '$id'";
    $res = mysqli_query($conn, $sql);
    if ($res) {
        header('location:' . SITEURL . '/daftar-jabatan.php');
    }
}
?>