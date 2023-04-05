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
        <title>21081010216 - Faisal Wildan Habibi - UTS PemWeb B081 - Data Bus</title>
    </head>
    <body>
        <ul>
            <li><a href="trans.php">Data Bus Trans UPN</a></li>
            <li class="current"><a href="bus.php">Data Bus</a></li>
            <li><a href="driver.php">Data Driver</a></li>
            <li><a href="kondektur.php">Data Kondektur</a></li>
            <li><a href="tambahTrans.php">Tambah Data Bus Trans UPN</a></li>
            <li><a href="tambahBus.php">Tambah Data Bus</a></li>
            <li><a href="tambahDriver.php">Tambah Data Driver</a></li>
            <li><a href="tambahKondektur.php">Tambah Data Kondektur</a></li>
            <li><a href="gajiDriver.php">Gaji Driver</a></li>
            <li><a href="gajiKondektur.php">Gaji Kondektur</a></li>
        </ul>
        <h2>Tabel Data Bus</h2>
        Status:
        <form method="get">
            <select name="status" id="status">
                <option value="all" selected>Semua</option>
                <option value="1">Beroperasi</option>
                <option value="2">Cadangan</option>
                <option value="0">Rusak</option>
            </select>
            <button type="submit">Pilih</button>
        </form>
        <table border="2px">
            <thead>
                <tr>
                    <th>ID Bus</th>
                    <th>Plat</th>
                    <th>Status</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    //menampilkan database
                    if (isset($_GET["status"])) {
                        $status = $_GET["status"];
                        if($status == "all") {
                            $query = "SELECT * FROM bus";
                        } else {
                            $query = "SELECT * FROM bus WHERE status = $status";
                        }
                    } else {
                        $query = "SELECT * FROM bus";
                    }
                    $result = mysqli_query(connection(),$query);
                ?>
                <?php while($data = mysqli_fetch_array($result)): ?>
                <tr>
                    <td><?php echo $data['id_bus'];  ?></td>
                    <td><?php echo $data['plat'];  ?></td>
                    <td class="<?php if ($data['status'] == 1){ echo 'aktif';} elseif ($data['status'] == 2) { echo 'cadangan';} elseif ($data['status'] == 0){ echo 'rusak';} ?>">
                        <?php echo $data['status'];  ?>
                    </td>
                    <td>
                        <a href="<?php echo "ubahBus.php?id=".$data['id_bus']; ?>"><button>Ubah</button></a>
                        <a href="<?php echo "hapusBus.php?id=".$data['id_bus']; ?>"><button>Hapus</button></a>
                    </td>
                </tr>
                <?php endwhile ?>
            </tbody>
        </table>
    </body>
</html>