<?php include('config/constants.php') ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pegawai</title>
</head>

<body style="background-color: #F3E8FF;">
    <div style="display: flex; flex-direction: row; ">
        <button onclick="location.href='index.php'"
            style="margin-top: 1rem; margin-rght: 20px; background-color: #B46060; color: white; padding: 10px 20px; border: none; cursor: pointer;">Kembali</button>
        <button onclick="location.href='tambah-jabatan.php'"
            style="margin-top: 1rem; margin-left: 20px; background-color: #B46060; color: white; padding: 10px 20px; border: none; cursor: pointer;">Tambah
            Jabatan</button>
        <button onclick="location.href='tambah-divisi.php'"
            style="margin-top: 1rem; margin-left: 20px; background-color: #B46060; color: white; padding: 10px 20px; border: none; cursor: pointer;">Tambah
            Divisi</button>
    </div>
    <form method="post" style="margin-top: 2rem;">
        <input type="text" name="nik" placeholder="NIK Karyawan">
        <input type="text" name="nama_karyawan" placeholder="Nama Karyawan">
        <select name="jabatan">
            <option value="">-- Pilih Jabatan --</option>
            <?php
            $sql = "select id, name from jabatan";
            $res = mysqli_query($conn, $sql);
            if ($res) {
                $data = mysqli_fetch_all($res, MYSQLI_ASSOC);
            }
            ?>
            <?php foreach ($data as $row): ?>
                <option value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option>
            <?php endforeach; ?>
        </select>
        <select name="jenis_kelamin">
            <option value="">-- Pilih Jenis Kelamin --</option>
            <option value="L">Laki laki</option>
            <option value="P">Perempuan</option>
        </select>
        <input type="text" name="phone_number" id="" placeholder="Input no hp">
        <input type="date" name="tgl_masuk" placeholder="Tanggal Masuk">
        <select name="divisi">
            <option value="">-- Pilih Divisi --</option>
            <?php
            $sql = "select id, name from divisi";
            $res = mysqli_query($conn, $sql);
            if ($res) {
                $data = mysqli_fetch_all($res, MYSQLI_ASSOC);
            }
            ?>
            <?php foreach ($data as $row): ?>
                <option value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option>
            <?php endforeach; ?>
        </select>
        <input style="background-color: #4D4D4D; margin-left: 20px; border: none; padding: 5px 10px; font-weight: bold; color: #FFFFFF;" type="submit" value="Submit" name="submit">


    </form>
</body>

</html>
<?php
if (isset($_POST['submit'])) {
    $name = htmlspecialchars($_POST['nama_karyawan']);
    $nik = htmlspecialchars($_POST['nik']);
    $jabatan = htmlspecialchars($_POST['jabatan']);
    $jenis_kelamin = htmlspecialchars($_POST['jenis_kelamin']);
    $tgl_masuk = date('Y-m-d', strtotime($_POST['tgl_masuk']));
    $divisi = htmlspecialchars($_POST['divisi']);
    $phone_number = htmlspecialchars($_POST['phone_number']);

    $insertKaryawanSql = "insert into karyawan (name, nik, jenis_kelamin, tgl_masuk, no_telpon, jabatan_id, divisi_id) values('$name', '$nik', '$jenis_kelamin', '$tgl_masuk', '$phone_number', '$jabatan', '$divisi')";
    $resultInsertKaryawan = mysqli_query($conn, $insertKaryawanSql);
    if ($resultInsertKaryawan) {
        header('location:' . SITEURL . '/index.php');
    }
}
?>