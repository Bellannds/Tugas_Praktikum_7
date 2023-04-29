<?php include('config/constants.php') ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Jabatan</title>
</head>

<body>
    <table>
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama Jabatan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "select * from jabatan";
            $res = mysqli_query($conn, $sql);
            $count = 0;
            if ($res) {
                $count = mysqli_num_rows($res);
                $data = mysqli_fetch_all($res, MYSQLI_ASSOC);
            }
            $no = 1;
            ?>
            <?php if ($count > 0): ?>
                <?php foreach ($data as $row): ?>
                    <tr>
                        <td>
                            <?php echo $no++ ?>
                        </td>
                        <td>
                            <?php echo $row['name'] ?>
                        </td>
                        <td>
                            <a href="<?php echo SITEURL; ?>/edit-jabatan.php?id=<?php echo $row['id']; ?>">Ubah</a>
                            <a href="<?php echo SITEURL; ?>/delete-jabatan.php?id=<?php echo $row['id']; ?>">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="3">Data kosong</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>

</html>