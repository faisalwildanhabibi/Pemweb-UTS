<?php
    include ('conn.php');
    include ('style.php');

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id_kondektur = $_POST['id_kondektur'];
        $id_bus = $_POST['id_bus'];
        $id_driver = $_POST['id_driver'];
        $jumlah_km = $_POST['jumlah_km'];
        $tanggal = $_POST['tanggal'];
        $query = "INSERT INTO trans_upn (id_kondektur, id_bus, id_driver, jumlah_km, tanggal) VALUES ('$id_kondektur','$id_bus','$id_driver','$jumlah_km','$tanggal')";
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
        <title>21081010216 - Faisal Wildan Habibi - UTS PemWeb B081 - Tambah Data Bus Trans UPN</title>
    </head>
    <body>
        <ul>
            <li><a href="trans.php">Data Bus Trans UPN</a></li>
            <li><a href="bus.php">Data Bus</a></li>
            <li><a href="driver.php">Data Driver</a></li>
            <li><a href="kondektur.php">Data Kondektur</a></li>
            <li class="current"><a href="tambahTrans.php">Tambah Data Bus Trans UPN</a></li>
            <li><a href="tambahBus.php">Tambah Data Bus</a></li>
            <li><a href="tambahDriver.php">Tambah Data Driver</a></li>
            <li><a href="tambahKondektur.php">Tambah Data Kondektur</a></li>
            <li><a href="gajiDriver.php">Gaji Driver</a></li>
            <li><a href="gajiKondektur.php">Gaji Kondektur</a></li>
        </ul>
        <h2>Form Tambah Data Bus Trans UPN</h2>
        <form action="tambahTrans.php" method="POST">
            <table border="2px">
                <tr>
                    <td><label for="id_kondektur" > ID Kondektur:</label></td>
                    <td><input type="text" name="id_kondektur" id="id_kondektur"></td>
                </tr>
                <tr>
                    <td><label for="id_bus" > ID Bus:</label></td>
                    <td><input type="text" name="id_bus" id="id_bus"></td>
                </tr>
                <tr>
                    <td><label for="id_driver" > ID Driver:</label></td>
                    <td><input type="text" name="id_driver" id="id_driver"></td>
                </tr>
                <tr>
                    <td><label for="jumlah_km" > Jumlah KM:</label></td>
                    <td><input type="text" name="jumlah_km" id="jumlah_km"></td>
                </tr>
                <tr>
                    <td><label for="tanggal" > Tanggal:</label></td>
                    <td><input type="text" name="tanggal" id="tanggal"></td>
                </tr>
            </table>
            <button type="submit">Tambah</button>
        </form>
    </body>
</html>