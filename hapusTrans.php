<?php
    include ('conn.php');
    include ('style.php');

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        if (isset($_GET['id'])) {
            $id_trans_upn = $_GET['id'];
            $query = "DELETE FROM trans_upn WHERE id_trans_upn = $id_trans_upn";
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
            header('Location: trans.php?status='.$result);
        }
    }
?>