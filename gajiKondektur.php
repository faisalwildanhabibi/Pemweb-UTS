<?php
    include('conn.php');
    include('style.php');

    $query = "SELECT * FROM kondektur";
    $result = mysqli_query(connection(),$query);
        if ($result) {
            $status = 'okay';
        } else {
            $status = 'error';
        }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>21081010216 - Faisal Wildan Habibi - UTS PemWeb B081 - Gaji Kondektur</title>
  </head>
  <body>
    <ul>
      <li><a href="trans.php">Database Trans UPN</a></li>
      <li><a href="bus.php">Data Bus</a></li>
      <li><a href="driver.php">Data Driver</a></li>
      <li><a href="kondektur.php">Data Kondektur</a></li>
      <li><a href="addtransupn.php">Add Data Trans UPN</a></li>
      <li><a href="addbus.php">Add Data Bus</a></li>
      <li><a href="adddriver.php">Add Data Driver</a></li>
      <li><a href="addkondektur.php">Add Data Kondektur</a></li>
      <li><a href="gajidriver.php">Gaji Driver</a></li>
      <li class="current"><a href="gajiKondektur.php">Gaji Kondektur</a></li>
    </ul>
    <h2>Gaji Kondektur</h2>
      <form action=<?php echo "gajiKondektur.php"?> method="get">
        <label for="bulan">Filter berdasarkan bulan:</label>
        <select class="custom-select" name="bulan" required="required">
          <option value="">Pilih Salah Satu</option>
          <?php 
            $getKondektur = "select kondektur.id_kondektur,nama,sum(jumlah_km) as jumlah_km,tanggal,month(tanggal) as bulan from trans_upn
            join kondektur on trans_upn.id_driver = kondektur.id_kondektur group by month(tanggal) order by month(tanggal)"; 
            $kondekturList = mysqli_query(connection(),$getKondektur);
            while($getKondektur = mysqli_fetch_array($kondekturList)):
          ?>
          <option value="<?php echo $getKondektur["bulan"]?>"><?php echo $getKondektur["bulan"]?></option>
          <?php endwhile ?>
        </select>
        <button type="submit">filter</button>
      </form>
        <form action="gajikondektur.php" method="get">
          <button type="submit">reset</button>
        </form>
        <table border="2px">
          <thead>
            <tr>
              <th>id_kondektur</th>
              <th>nama</th>
              <th>jumlah_km</th>
              <th>tanggal</th>
              <th>bulan ke</th>
              <th>gaji</th>
            </tr>
          </thead>
          <tbody>
            <?php 
              $query="";
              if (isset($_GET['bulan'])) {
                $query = "select kondektur.id_kondektur,nama,sum(jumlah_km) as jumlah_km,tanggal,month(tanggal) as bulan from trans_upn
                join kondektur on trans_upn.id_driver = kondektur.id_kondektur where month(tanggal) = ".$_GET['bulan'] ." group by trans_upn.id_kondektur, month(tanggal);" ;               
              } else {
                $query = "select kondektur.id_kondektur,nama,sum(jumlah_km) as jumlah_km,tanggal,month(tanggal) as bulan from trans_upn
                join kondektur on trans_upn.id_driver = kondektur.id_kondektur group by trans_upn.id_kondektur, month(tanggal);";             
              }
              $result = mysqli_query(connection(),$query);
            ?>
      <?php while($data = mysqli_fetch_array($result)): ?>
        <tr>
          <td><?php echo $data['id_kondektur'];  ?></td>
          <td><?php echo $data['nama'];  ?></td>
          <td><?php echo $data['jumlah_km'];  ?></td>
          <td><?php echo $data['tanggal'];  ?></td>
          <td><?php echo $data['bulan'];  ?></td>
          <td><?php echo $data['jumlah_km'] * 1500;  ?></td>                  
        </tr>
        <?php endwhile ?>
      </tbody>
    </table>
  </body>
</html>