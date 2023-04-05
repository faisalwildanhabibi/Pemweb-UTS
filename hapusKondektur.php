<?php
    include ('conn.php');
    include ('style.php');

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        if (isset($_GET['id'])) {
            $id_kondektur = $_GET['id'];
            $query = "DELETE FROM kondektur WHERE id_kondektur = $id_kondektur";
            $result = mysqli_query(connection(),$query);
            if ($result) {
                echo '<script language="javascript">';
                echo 'alert("Data berhasil dihapus")';
                echo '</script>';
            } else {
                echo '<script language="javascript">';
                echo 'alert("Data gagal dihapus")';
                echo '</script>';
            }
            header('Location: kondektur.php?status='.$result);
        }
    }
?>