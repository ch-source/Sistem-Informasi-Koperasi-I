<?php
 session_start();
include "koneksi.php";
    if (isset($_POST['masuk'])) {
        $user = $_POST['Username'];
        $pass = $_POST['Password'];

        $cek = mysqli_query($connect, "SELECT * FROM tbl_user WHERE username = '$user' AND password = '$pass'");
        $result = mysqli_num_rows($cek);
        $data = mysqli_fetch_array($cek);
        if ($result > 0) {
            if ($data['level']=='Admin') {
                $_SESSION['masuk'] = $user;
                 header("location:dashboard.php?p=halaman_awal&notif=login-sukses");
            }elseif ($data['level']=='Ketua Koperasi') {
                $_SESSION['masuk'] = $user;
                header("location:dashboard_kk.php?p=halaman_awal&notif=login-sukses");
            }
        }else if ($result ==0) {
             header("location:index.php?notif=login-gagal");
            }
        }   
?>