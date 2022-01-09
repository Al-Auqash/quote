<?php
include("./koneksi/koneksi.php");
if ((isset($_GET['action'])) && (isset($_GET['data']))) {
    if ($_GET['action'] == 'delete') {
        $id = $_GET['data'];
        $sql_delete = "DELETE FROM `quote` WHERE `id` = '$id'";
        mysqli_query($koneksi, $sql_delete);
    }
}
?>

<section class="mt-4">
    <div class="container">
        <div class="d-flex flex-column justify-content-center align-items-center">

            <?php if (!empty($_GET['notif'])) { ?>
                <?php if ($_GET['notif'] == "success") { ?>
                    <span class="text-info">Quote has been added</span>
                <?php } else if ($_GET['notif'] == "DeleteSuccess") { ?>
                    <span class="text-info">Quote has been deleted</span>
                <?php } ?>
            <?php } ?>

            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th>Quotes</th>
                        <th>Quotes by</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM quote";
                    $query = mysqli_query($koneksi, $sql);
                    while ($data = mysqli_fetch_row($query)) {
                        $id = $data[0];
                        $quote = $data[1];
                        $quote_by = $data[2];
                    ?>
                        <tr>
                            <td><?php echo $quote ?></td>
                            <td><?php echo $quote_by ?></td>
                            <td>
                                <a class="btn btn-primary" href="index.php?include=edit-quote&data=<?php echo $id ?>">Edit</a>
                                <a class="btn btn-danger" href="javascript:if(confirm('Anda yakin ingin menghapus data ini?')) window.location.href = 'index.php?include=quote&action=delete&data=<?php echo $id; ?>&notif=deleteSuccess'">Delete</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</section>