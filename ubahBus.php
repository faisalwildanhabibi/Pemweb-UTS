<?php
    include ('conn.php');
    include ('style.php');

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        if (isset($_GET['id'])) {
            $id_bus = $_GET['id'];
            $query = "SELECT * FROM bus WHERE id_bus = $id_bus";
            $result = mysqli_query(connection(),$query);
        }
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id_bus = $_POST['id_bus'];
        $plat = $_POST['plat'];
        $status = $_POST['status'];
        $sql = "UPDATE bus SET id_bus='$id_bus', plat='$plat', status='$status' WHERE id_bus='$id_bus'";
        $result = mysqli_query(connection(),$sql);
        if ($result) {
            echo '<script language="javascript">';
            echo 'alert("Data berhasil diubah")';
            echo '</script>';
        } else {
            echo '<script language="javascript">';
            echo 'alert("Data gagal diubah")';
            echo '</script>';
        }
        header('Location: bus.php?status='.$result);
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>21081010216 - Faisal Wildan Habibi - UTS PemWeb B081 - Ubah Data Bus</title>
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
        <h2>Ubah Data Bus</h2>
        <form action="ubahBus.php" method="POST">
            <?php while($data = mysqli_fetch_array($resultGet)): ?>
                <table>
                    <tr>
                        <td><label for="id_bus" > ID Bus:</label></td>
                        <td><input type="text" name="id_bus" id="id_bus" placeholder="<?php echo $data['id_bus'];?>"></td>
                    </tr>
                    <tr>
                        <td><label for="plat" > Plat:</label></td>
                        <td><input type="text" name="plat" id="plat" placeholder="<?php echo $data['plat'];?>"></td>
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
            <?php endwhile ?>
            <button type="submit">Ubah</button>
        </form>
    </body>
</html>