<?php
 //akses file koneksi database
    if (isset($_POST['sign-in'])) {
        $user = $_POST['username'];
        $pass = $_POST['password'];
        $username = mysqli_real_escape_string($koneksi, $user);
        $password = mysqli_real_escape_string($koneksi, MD5($pass));

        //cek username dan password
        $sql="SELECT `id` from `user` where `username`='$username' and `password`='$password'";
        $query = mysqli_query($koneksi, $sql);
        $jumlah = mysqli_num_rows($query);
        if(empty($user)){
            header("Location:index.php?include=sign-in&gagal=userKosong");
        }else if(empty($pass)){
            header("Location:index.php?include=sign-in&gagal=passKosong");
        }else if($jumlah==0){
            header("Location:index.php?include=sign-in&gagal=userpassSalah");
        }else{
        //get data
            while($data = mysqli_fetch_row($query)){
                $id = $data[0];
                $_SESSION['id']=$id;
                header("Location:index.php?include=quote");
            }
        }
    } else {
        header("Location:index.php?include=sign-up");
    }
