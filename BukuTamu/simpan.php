<?php

include('koneksi.php');

$nama       = $_POST['nama'];
$email      = $_POST['email'];
$isi        = $_POST['isi'];

$query      = "INSERT INTO buku_tamu (nama, email, isi)
               VALUES ('$nama', '$email', '$isi')";

if ($conn->query($query) === TRUE) {
    echo "Data telah berhasil dimasukkan";
} else {
    echo "Terjadi kesalahan: " . $conn->error;
}

$conn->close();
?>