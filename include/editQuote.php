<?php
include("./koneksi/koneksi.php");
if (isset($_GET['data'])) {
    $id = $_GET['data'];
    $_SESSION['id'] = $id;
    $sql_m = "SELECT `id`,`quote`,`quote_by` FROM `quote` WHERE `id`='$id'";
    $query_m = mysqli_query($koneksi, $sql_m);
    while ($data_m = mysqli_fetch_row($query_m)) {
        $id = $data_m[0];
        $quote = $data_m[1];
        $quote_by = $data_m[2];
    }
}
?>

<section class="mt-4">
    <div class="container-sm">
        <div class="d-flex flex-column justify-content-center">
            <div class="card bg-light mb-3 mt-4 mx-auto" style="width: 48rem;">
                <div class="card-header">
                    <h3>Edit Quote</h2>
                </div>
                <div class="card-body login-card-body">
                    <form action="index.php?include=confirm-edit-quote" method="post">
                        <input type="hidden" name="id" value="<?php echo $id ?>" />
                        <div class="form-group row">
                            <label class="col-md-12 control-label" for="quote">Quote</label>
                            <div class="col-md-12">
                                <input name="quote" type="text" class="form-control" autocomplete="off" id="quote" value="<?php echo $quote ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-12 control-label" for="quoteBy">Quote By</label>
                            <div class="col-md-12">
                                <input name="quoteBy" type="text" class="form-control" autocomplete="off" id="quoteBy" value="<?php echo $quote_by ?>">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary" name="save" value="save">Save</button>

                        <?php if (!empty($_GET['notif'])) { ?>
                            <?php if ($_GET['notif'] == "quoteKosong") { ?>
                                <span class="text-danger">Quote cannot be empty</span>
                            <?php } else if ($_GET['notif'] == "quoteByKosong") { ?>
                                <span class="text-danger">Quote By cannot be empty</span>
                            <?php } else { ?>
                                <span class="text-danger">Failed, data has not been updated</span>
                            <?php } ?>
                        <?php } ?>

                    </form>
                </div>
            </div>
        </div>
    </div>
</section>