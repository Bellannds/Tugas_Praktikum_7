<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Buku Tamu</title>
</head>
<body>
    <h1 style="text-align: center;font-size: 3.5rem">Buku Tamu</h1>
    <form action="simpan.php" method="POST">
        Nama          : <input type="text" name="nama" style="margin-top: .5rem"><br>
        E-mail        : <input type="text" name="email" style="margin-top: .5rem"><br>
        Isi           : <br>
        <textarea name="isi" style="margin-top: .5rem"></textarea>
        <input type="submit" style="margin-top: -1rem;" value="Submit">
    </form>
</body>
</html>