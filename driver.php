<?php
    include ('conn.php');
    include ('style.php');
?>

<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>21081010216 - Faisal Wildan Habibi - UTS PemWeb B081 - Data Driver</title>
    </head>
    <body>
        <ul>
            <li><a href="trans.php">Data Bus Trans UPN</a></li>
            <li><a href="bus.php">Data Bus</a></li>
            <li class="current"><a href="driver.php">Data Driver</a></li>
            <li><a href="kondektur.php">Data Kondektur</a></li>
            <li><a href="tambahTrans.php">Tambah Data Bus Trans UPN</a></li>
            <li><a href="tambahBus.php">Tambah Data Bus</a></li>
            <li><a href="tambahDriver.php">Tambah Data Driver</a></li>
            <li><a href="tambahKondektur.php">Tambah Data Kondektur</a></li>
            <li><a href="gajiDriver.php">Gaji Driver</a></li>
            <li><a href="gajiKondektur.php">Gaji Kondektur</a></li>
        </ul>
        <h2>Tabel Data Driver</h2>
        <table border="2px">
            <thead>
                <tr>
                    <th>ID Driver</th>
                    <th>Nama</th>
                    <th>No SIM</th>
                    <th>Alamat</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    //proses menampilkan data dari database:
                    $query = "SELECT * FROM driver";
                    $result = mysqli_query(connection(),$query);
                ?>
                <?php while($data = mysqli_fetch_array($result)): ?>
                <tr>
                    <td><?php echo $data['id_driver'];  ?></td>
                    <td><?php echo $data['nama'];  ?></td>
                    <td><?php echo $data['no_sim'];  ?></td>
                    <td><?php echo $data['alamat'];  ?></td>
                    <td>
                        <a href="<?php echo "ubahDriver.php?id=".$data['id_driver']; ?>"><button>Ubah</button></a>
                        <a href="<?php echo "hapusDriver.php?id=".$data['id_driver']; ?>"><button>Hapus</button></a>
                    </td>
                </tr>
                <?php endwhile ?>
            </tbody>
        </table>
    </body>
</html>