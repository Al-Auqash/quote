<?php
//akses file koneksi database
if (isset($_POST['sign-up'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    //cek username dan password
    $sql = "SELECT `id` from `user` where `username`='$username'";
    $query = mysqli_query($koneksi, $sql);
    $jumlah = mysqli_num_rows($query);
    if (empty($username)) {
        header("Location:index.php?include=sign-up&gagal=userKosong");
    } else if (empty($password)) {
        header("Location:index.php?include=sign-up&gagal=passKosong");
    } else if ($jumlah != 0) {
        header("Location:index.php?include=sign-up&gagal=userpassSalah");
    } else {
        //get data
        $id = "SELECT `id` FROM `user` ORDER BY `id` DESC LIMIT 1";
        $res = mysqli_query($koneksi, $id);
        $data = mysqli_fetch_row($res);

        if ($data != null) {
            $new_id = $data[0] + 1;
        } else {
            $new_id = 0;
        }

        $sql_add = "INSERT INTO `user` (`id`, `username`, `password`) VALUES ('$new_id', '$username', MD5('$password'))";
        if (mysqli_query($koneksi, $sql_add)) {
            header("Location:index.php?include=sign-in");
        } else {
            header("Location:index.php?include=sign-up");
        }
    }
} else {
    header("Location:index.php?include=sign-up");
}
