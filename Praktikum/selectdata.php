<!DOCTYPE html>
<html>
<body>

<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "my_db";

    //create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    //check connection
    if (!$conn) {
        die("connection failed: ". mysqli_connect_error());
    }

     $sql = "SELECT DISTINCT kode, negara, champion FROM liga";
     $result = mysqli_query($conn, $sql);
     
     if (mysqli_num_rows($result) > 0){
        //output data of each row
        while ($row = mysqli_fetch_assoc($result)){
            echo "Kode :  " . $row["kode"] . " - Negara :  " . $row["negara"] . " - Champion :  " 
            . $row["champion"]. "<br>";
        }
     } else {
        echo "0 result";
     }

mysqli_close($conn);
?>
</body>
</html>