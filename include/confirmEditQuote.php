<?php
//akses file koneksi database
if (isset($_POST['save'])) {
    $id = $_POST['id'];
    $quote = $_POST['quote'];
    $quoteBy = $_POST['quoteBy'];
    if (empty($quote)) {
        header("Location:index.php?include=edit-quote&notif=quoteKosong&data=".$id);
    } else if (empty($quoteBy)) {
        header("Location:index.php?include=edit-quote&notif=quoteByKosong&data=".$id);
    } else {
        if ($sql = "UPDATE `quote` set `id`='$id', `quote`='$quote', `quote_by`='$quoteBy' WHERE `id`='$id'") {
            mysqli_query($koneksi, $sql);
            header("Location:index.php?include=quote&notif=success");
        } else {
            header("Location:index.php?include=edit-quote&notif=fail");
        }
    }
}
