<?php
    include ('conn.php');
    include ('style.php');

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $plat = $_POST['plat'];
        $status = $_POST['status'];
        $query = "INSERT INTO bus (plat, status) VALUES ('$plat','$status')";
        $result = mysqli_query(connection(),$query);
        if ($result) {
            echo '<script language="javascript">';
            echo 'alert("Data berhasil ditambahkan")';
            echo '</script>';
        } else {
            echo '<script language="javascript">';
            echo 'alert("Data gagal ditambahkan")';
            echo '</script>';
        }
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>21081010216 - Faisal Wildan Habibi - UTS PemWeb B081 - Tambah Data Bus</title>
    </head>
    <body>
        <ul>
            <li><a href="trans.php">Data Bus Trans UPN</a></li>
            <li><a href="bus.php">Data Bus</a></li>
            <li><a href="driver.php">Data Driver</a></li>
            <li><a href="kondektur.php">Data Kondektur</a></li>
            <li><a href="tambahTrans.php">Tambah Data Bus Trans UPN</a></li>
            <li class="current"><a href="tambahBus.php">Tambah Data Bus</a></li>
            <li><a href="tambahDriver.php">Tambah Data Driver</a></li>
            <li><a href="tambahKondektur.php">Tambah Data Kondektur</a></li>
            <li><a href="gajiDriver.php">Gaji Driver</a></li>
            <li><a href="gajiKondektur.php">Gaji Kondektur</a></li>
        </ul>
        <h2>Form Tambah Data Bus</h2>
        <form action="tambahBus.php" method="POST">
            <table border="2px">
                <tr>
                    <td><label for="plat" > Plat:</label></td>
                    <td><input type="text" name="plat" id="plat"></td>
                </tr>
                <tr>
                    <td><label for="status" > Status:</label></td>
                    <td><select name="status" id="status">
                                <option value="1">Aktif</option>
                                <option value="2">Cadangan</option>
                                <option value="0">Rusak</option>
                        </select>
                    </td>
                </tr>
            </table>
            <button type="submit">Tambah</button>
        </form>
    </body>
</html>