<?php
//akses file koneksi database
if (isset($_POST['save'])) {
    $quote = $_POST['quote'];
    $quoteBy = $_POST['quoteBy'];
    if (empty($quote)) {
        header("Location:index.php?include=create-quote&notif=quoteKosong");
    } else if (empty($quoteBy)) {
        header("Location:index.php?include=create-quote&notif=quoteByKosong");
    } else {
        $id = "SELECT `id` FROM `quote` ORDER BY `id` DESC LIMIT 1";
        $res = mysqli_query($koneksi, $id);
        $data = mysqli_fetch_row($res);
        
        if($data != null){
            $new_id = $data[0] + 1;
        } else{
            $new_id = 0;
        }

        if ($sql = "INSERT INTO `quote` (`id`, `quote`, `quote_by`) VALUES ('$new_id', '$quote', '$quoteBy')") {
            mysqli_query($koneksi, $sql);
            header("Location:index.php?include=quote&notif=success");
        } else {
            header("Location:index.php?include=create-quote&notif=fail");
        }
    }
}
