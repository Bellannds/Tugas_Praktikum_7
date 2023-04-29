<?php include('config/constants.php') ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pegawai</title>

</head>

<body style="background-color: #F3E8FF;" >
    <div style="margin: 0 auto; width: 90%">
        <h1 align="center">Halaman Data Pegawai</h1>
        <button onclick="location.href='tambah-karyawan.php'" style="margin-top: 1rem; background-color: #B46060; color: white; padding: 10px 20px; border: none; cursor: pointer;">Tambah Data Pegawai</button>
    <table border="1" cellpadding="0" width="100%" style="text-align: center; margin-top: 1rem;">
        <thead>
            <tr align="center" bgcolor="#FA9884">
                <th>No.</th>
                <th>NIK</th>
                <th>Nama Pegawai</th>
                <th>Jabatan</th>
                <th>Tanggal Masuk</th>
                <th>Divisi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "select karyawan.id, karyawan.nik, karyawan.name, jabatan.name as jabatan_name, tgl_masuk, divisi.name as divisi_name from karyawan 
            inner join jabatan on jabatan.id = karyawan.jabatan_id inner join divisi on divisi.id = karyawan.divisi_id";
            $res = mysqli_query($conn, $sql);
            $count = 0;
            if ($res) {
                $count = mysqli_num_rows($res);
                $data = mysqli_fetch_all($res, MYSQLI_ASSOC);
            }
            $no = 1;
            ?>
            <?php if ($count > 0): ?>
                <?php foreach($data as $row): ?>
                    <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $row['nik'] ?></td>
                        <td><?php echo $row['name'] ?></td>
                        <td><?php echo $row['jabatan_name'] ?></td>
                        <td><?php echo $row['tgl_masuk'] ?></td>
                        <td><?php echo $row['divisi_name'] ?></td>
                        <td>
                        <a href="<?php echo SITEURL; ?>/edit-karyawan.php?id=<?php echo $row['id']; ?>">Ubah</a>
                            <a href="<?php echo SITEURL; ?>/delete-karyawan.php?id=<?php echo $row['id']; ?>">Hapus</a>

                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="7">Data kosong</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>

</html>