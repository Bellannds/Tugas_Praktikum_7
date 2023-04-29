<?php include('config/constants.php') ?>

<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "select * from karyawan where id = '$id'";
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
    <title>Edit Pegawai</title>
</head>

<body style="background-color: #F3E8FF;">
    <form method="post">
        <input type="text" name="nik" placeholder="NIK Karyawan" value="<?php echo $data['nik'] ?>">
        <input type="text" name="nama_karyawan" placeholder="Nama Karyawan" value="<?php echo $data['name'] ?>">
        <select name="jabatan">
            <option value="">-- Pilih Jabatan --</option>
            <?php
            $sql = "select id, name from jabatan";
            $res = mysqli_query($conn, $sql);
            if ($res) {
                $datas = mysqli_fetch_all($res, MYSQLI_ASSOC);
            }
            ?>
            <?php foreach ($datas as $row): ?>
                <option value="<?php echo $row['id'] ?>" <?php echo $row['id'] == $data['jabatan_id'] ? 'selected' : '' ?>>
                    <?php echo $row['name'] ?></option>
            <?php endforeach; ?>
        </select>
        <select name="jenis_kelamin">
            <option value="">-- Pilih Jenis Kelamin --</option>
            <option value="L" <?php echo $data['jenis_kelamin'] == 'L' ? 'selected' : '' ?>>Laki laki</option>
            <option value="P" <?php echo $data['jenis_kelamin'] == 'P' ? 'selected' : '' ?>>Perempuan</option>
        </select>
        <input type="text" name="phone_number" id="" placeholder="Input no hp"
            value="<?php echo $data['no_telpon']; ?>">
        <input type="date" name="tgl_masuk" placeholder="Tanggal Masuk" value="<?php echo $data['tgl_masuk']; ?>">
        <select name="divisi">
            <option value="">-- Pilih Divisi --</option>
            <?php
            $sql = "select id, name from divisi";
            $res = mysqli_query($conn, $sql);
            if ($res) {
                $datas = mysqli_fetch_all($res, MYSQLI_ASSOC);
            }
            ?>
            <?php foreach ($datas as $row): ?>
                <option value="<?php echo $row['id'] ?>" <?php echo $row['id'] == $data['divisi_id'] ? 'selected' : '' ?>>
                    <?php echo $row['name'] ?></option>
            <?php endforeach; ?>
        </select>
        <input type="submit" value="Submit" name="submit">
    </form>
</body>

</html>
<?php
if (isset($_POST['submit'])) {
    $id = $_GET['id'];
    $name = htmlspecialchars($_POST['nama_karyawan']);
    $nik = htmlspecialchars($_POST['nik']);
    $jabatan = htmlspecialchars($_POST['jabatan']);
    $jenis_kelamin = htmlspecialchars($_POST['jenis_kelamin']);
    $tgl_masuk = date('Y-m-d', strtotime($_POST['tgl_masuk']));
    $divisi = htmlspecialchars($_POST['divisi']);
    $phone_number = htmlspecialchars($_POST['phone_number']);

    $updateKaryawanSql = "update karyawan set name='$name', nik = '$nik', jabatan_id = '$jabatan', divisi_id = '$divisi', jenis_kelamin = '$jenis_kelamin', no_telpon='$phone_number', tgl_masuk='$tgl_masuk' where id = '$id'";
    $resultUpdateKaryawan = mysqli_query($conn, $updateKaryawanSql);
    if ($resultUpdateKaryawan) {
        header('location:' . SITEURL . '/index.php');
    }
}
?>