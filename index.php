<?php
session_start();
include("koneksi/koneksi.php");
if (isset($_GET["include"])) {
    $include = $_GET["include"];
    if ($include == "sign-out") {
        include("include/signout.php");
    } else if ($include == "confirm-sign-in") {
        include("include/confirmSignIn.php");
    } else if ($include == "confirm-sign-up") {
        include("include/confirmSignUp.php");
    } else if ($include == "confirm-create-quote") {
        include("include/confirmCreateQuote.php");
    } else if ($include == "confirm-edit-quote") {
        include("include/confirmEditQuote.php");
    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <?php include("includes/head.php"); ?>
</head>

<body>
    <?php include("includes/navigasi.php"); ?>
    <?php
    //pemanggilan konten halaman index
    if (isset($_GET["include"])) {
        $include = $_GET["include"];
        if (isset($_SESSION['id'])) {
            if ($include == "create-quote") {
                include("include/createQuote.php");
            } else if ($include == "quote") {
                include("include/index.php");
            } else if ($include == "edit-quote") {
                include("include/editQuote.php");
            }
        } else if ($include == "sign-up") {
            include("include/signup.php");
        } else {
            include("include/signin.php");
        }
    } else {
        include("include/signin.php");
        // header("Location:index.php?include=sign-in");
    }
    ?>

    <!-- Optional JavaScript; choose one of the two! -->
    <?php include("includes/script.php"); ?>
</body>

</html>