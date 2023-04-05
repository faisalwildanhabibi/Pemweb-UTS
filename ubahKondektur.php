<?php
    include ('conn.php');
    include ('style.php');

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        if (isset($_GET['id'])) {
            $idKondektur = $_GET['id'];
            $query = "SELECT * FROM kondektur WHERE id_kondektur = '$idKondektur'";
            $result = mysqli_query(connection(), $query);
        }
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $idKondektur = $_POST['id_kondektur'];
        $Nama = $_POST['nama'];
        $sql = "UPDATE kondektur SET id_kondektur='$idKondektur', nama='$Nama' WHERE id_kondektur='$idKondektur'";
        $result = mysqli_query(connection(), $sql);
        if ($result) {
            echo '<script language="javascript">';
            echo 'alert("Data berhasil diubah")';
            echo '</script>';
        } else {
            echo '<script language="javascript">';
            echo 'alert("Data gagal diubah")';
            echo '</script>';
        }
        header('Location: kondektur.php?status='.$result);
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>21081010216 - Faisal Wildan Habibi - UTS PemWeb B081 - Ubah Data Kondektur</title>
    </head>
    <body>   
        <ul>
            <li><a href="trans.php">Data Bus Trans UPN</a></li>
            <li><a href="bus.php">Data Bus</a></li>
            <li><a href="driver.php">Data Driver</a></li>
            <li><a href="kondektur.php">Data Kondektur</a></li>
            <li><a href="tambahTrans.php">Tambah Data Bus Trans UPN</a></li>
            <li><a href="tambahBus.php">Tambah Data Bus</a></li>
            <li><a href="tambahDriver.php">Tambah Data Driver</a></li>
            <li><a href="tambahKondektur.php">Tambah Data Kondektur</a></li>
            <li><a href="gajiDriver.php">Gaji Driver</a></li>
            <li><a href="gajiKondektur.php">Gaji Kondektur</a></li>
        </ul>
        <h2>Ubah Data Kondektur</h2>
        <form action="ubahKondektur.php" method="POST">
            <?php while($data = mysqli_fetch_array($result)): ?>
                <table>
                    <tr>
                        <td><label for="id_kondektur" > ID Kondektur:</label></td>
                        <td><input type="text" name="id_kondektur" id="id_kondektur" placeholder="<?php echo $data['id_kondektur'];?>"></td>
                    </tr>
                    <tr>
                        <td><label for="nama" > Nama:</label></td>
                        <td><input type="text" name="nama" id="nama" placeholder="<?php echo $data['nama'];?>"></td>
                    </tr>
                </table>
            <?php endwhile ?>
            <button type="submit">Ubah</button>
        </form>
    </body>
</html>